<?php
// Enable error reporting for debugging
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "1+Six=16";
$dbname = "db_admission";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitizeInput($conn, $data) {
    if (is_array($data)) {
        $data = implode(", ", $data); // Combine array elements into a comma-separated string
    }
    return $data !== null ? $conn->real_escape_string(trim(htmlspecialchars(stripslashes($data)))) : "";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // print_r($_FILES); // Debug: Inspect uploaded files
    // print_r($_POST); // Debug: Inspect form data

    // --- Insert Application Form Data ---
    $applicationDate = sanitizeInput($conn, $_POST["applicationDate"] ?? null);
    $applyingToYear = sanitizeInput($conn, $_POST["applyingToYear"] ?? null);
    $academicYear = sanitizeInput($conn, $_POST["academicYear"] ?? null);
    $firstName = sanitizeInput($conn, $_POST["firstName"] ?? null);
    $middleName = sanitizeInput($conn, $_POST["middleName"] ?? null);
    $surname = sanitizeInput($conn, $_POST["surname"] ?? null);
    $commonName = sanitizeInput($conn, $_POST["commonName"] ?? null);
    $dateOfBirth = sanitizeInput($conn, $_POST["dateOfBirth"] ?? null);
    $gender = sanitizeInput($conn, $_POST["gender"] ?? null);
    $countryOfBirth = sanitizeInput($conn, $_POST["countryOfBirth"] ?? null);
    $nationality = sanitizeInput($conn, $_POST["nationality"] ?? null);
    $otherNationalities = sanitizeInput($conn, $_POST["otherNationalities"] ?? null);
    $languagesSpoken = sanitizeInput($conn, $_POST["languagesSpoken"] ?? null);
    $passportNumber = sanitizeInput($conn, $_POST["passportNumber"] ?? null);
    $dateOfIssue = sanitizeInput($conn, $_POST["dateOfIssue"] ?? null);
    $dateOfExpiry = sanitizeInput($conn, $_POST["dateOfExpiry"] ?? null);
    $funding = sanitizeInput($conn, $_POST["funding"] ?? null);

    $sql = "INSERT INTO applications (applicationDate, applyingToYear, academicYear, firstName, middleName, surname, commonName, dateOfBirth, gender, countryOfBirth, nationality, otherNationalities, languagesSpoken, passportNumber, dateOfIssue, dateOfExpiry, funding) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssss", $applicationDate, $applyingToYear, $academicYear, $firstName, $middleName, $surname, $commonName, $dateOfBirth, $gender, $countryOfBirth, $nationality, $otherNationalities, $languagesSpoken, $passportNumber, $dateOfIssue, $dateOfExpiry, $funding);

    if ($stmt->execute()) {
        $applicationId = $conn->insert_id;
        $stmt->close();

        // --- Insert Emergency Contact Data ---
        $emergencyFirstName = sanitizeInput($conn, $_POST["emergencyFirstName"] ?? null);
        $emergencyMiddleName = sanitizeInput($conn, $_POST["emergencyMiddleName"] ?? null);
        $emergencySurname = sanitizeInput($conn, $_POST["emergencySurname"] ?? null);
        $parentGuardianNames = sanitizeInput($conn, $_POST["parentGuardianNames"] ?? null);
        $residentialAddress = sanitizeInput($conn, $_POST["residentialAddress"] ?? null);
        $landmark = sanitizeInput($conn, $_POST["landmark"] ?? null);
        $homeTelephone = sanitizeInput($conn, $_POST["homeTelephone"] ?? null);
        $mobileTelephone = sanitizeInput($conn, $_POST["mobileTelephone"] ?? null);
        $alternativeContactName = sanitizeInput($conn, $_POST["alternativeContactName"] ?? null);
        $alternativeAddress = sanitizeInput($conn, $_POST["alternativeAddress"] ?? null);
        $alternativeLandmark = sanitizeInput($conn, $_POST["alternativeLandmark"] ?? null);
        $alternativeTelephone = sanitizeInput($conn, $_POST["alternativeTelephone"] ?? null);
        $alternativeMobile = sanitizeInput($conn, $_POST["alternativeMobile"] ?? null);

        $sqlEmergency = "INSERT INTO emergency_contacts (application_id, firstName, middleName, surname, parentGuardianNames, residentialAddress, landmark, homeTelephone, mobileTelephone, alternativeContactName, alternativeAddress, alternativeLandmark, alternativeTelephone, alternativeMobile) 
                                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtEmergency = $conn->prepare($sqlEmergency);
        $stmtEmergency->bind_param("isssssssssssss", $applicationId, $emergencyFirstName, $emergencyMiddleName, $emergencySurname, $parentGuardianNames, $residentialAddress, $landmark, $homeTelephone, $mobileTelephone, $alternativeContactName, $alternativeAddress, $alternativeLandmark, $alternativeTelephone, $alternativeMobile);


        if ($stmtEmergency->execute()) {
            $stmtEmergency->close();

            // --- Upload Documents ---
            $targetDir = "uploads/";

            function uploadFile($conn, $fileInputName, $applicationId, $targetDir) {
                if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]["error"] == 0) {
                    $fileName = basename($_FILES[$fileInputName]["name"]);
                    $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                    $fileSize = $_FILES[$fileInputName]["size"];
                    $tmpFilePath = $_FILES[$fileInputName]["tmp_name"];
                    $allowedFormats = ["jpg", "jpeg", "png", "gif", "pdf", "doc", "docx"];

                    if ($fileSize > 5000000) {
                        echo "Error: File $fileName is too large.<br>";
                        return false;
                    }

                    if (!in_array($fileType, $allowedFormats)) {
                        echo "Error: Invalid file format ($fileName). Allowed: JPG, PNG, GIF, PDF, DOC, DOCX.<br>";
                        return false;
                    }

                    $newFileName = uniqid($applicationId . '_', true) . '.' . $fileType;
                    $finalFilePath = $targetDir . $newFileName;

                    if (move_uploaded_file($tmpFilePath, $finalFilePath)) {
                        $documentType = "";
                        switch ($fileInputName) {
                            case "transcript":
                                $documentType = "transcript";
                                break;
                            case "passport_copies":
                                $documentType = "passport_copies";
                                break;
                            case "student_photos":
                                $documentType = "photos";
                                break;
                            default:
                                echo "Error: invalid file input name";
                                return false;
                        }

                        $sql = "INSERT INTO documents (application_id, documentType, filePath) VALUES (?, ?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("iss", $applicationId, $documentType, $finalFilePath);
                        if ($stmt->execute()) {
                            $stmt->close();
                            echo "File $fileName uploaded successfully!<br>";
                            return true;
                        } else {
                            echo "Database Error: " . $conn->error . "<br>";
                        }
                    } else {
                        echo "Error moving file: $fileName.<br>";
                    }
                }
                return false;
            }

            uploadFile($conn, "transcript", $applicationId, $targetDir);
            uploadFile($conn, "passport_copies", $applicationId, $targetDir);
            uploadFile($conn, "student_photos", $applicationId, $targetDir);

    
            






            // --- Insert Medical Information ---
$allergies = sanitizeInput($conn, $_POST["allergies"] ?? null);
$chronicConditions = sanitizeInput($conn, is_array($_POST["chronicConditions"]) ? implode(", ", $_POST["chronicConditions"]) : $_POST["chronicConditions"]);
$otherConditions = sanitizeInput($conn, $_POST["otherConditions"] ?? null);
$otherDifficulties = sanitizeInput($conn, $_POST["otherDifficulties"] ?? null);
$hospitalization = sanitizeInput($conn, $_POST["hospitalization"] ?? null);
$dentistVisits = sanitizeInput($conn, $_POST["dentistVisits"] ?? null);
$routineMedicines = sanitizeInput($conn, $_POST["routineMedicines"] ?? null);
$emergencyMedication = sanitizeInput($conn, $_POST["emergencyMedication"] ?? null);
$specifiedMedicines = sanitizeInput($conn, $_POST["specifiedMedicines"] ?? null);
$specifiedEmergencyMed = sanitizeInput($conn, $_POST["specifiedEmergencyMed"] ?? null);
$lastVaccination = sanitizeInput($conn, $_POST["lastVaccination"] ?? null);
$height = sanitizeInput($conn, $_POST["height"] ?? null);
$weight = sanitizeInput($conn, $_POST["weight"] ?? null);
$pulse = sanitizeInput($conn, $_POST["pulse"] ?? null);
$bp = sanitizeInput($conn, $_POST["bp"] ?? null);
$nutritionalStatus = sanitizeInput($conn, $_POST["nutritionalStatus"] ?? null);
$hearingScreening = sanitizeInput($conn, $_POST["hearingScreening"] ?? null);
$visionDistanceL = sanitizeInput($conn, $_POST["visionDistanceL"] ?? null);
$visionDistanceR = sanitizeInput($conn, $_POST["visionDistanceR"] ?? null);
$visionReadingL = sanitizeInput($conn, $_POST["visionReadingL"] ?? null);
$visionReadingR = sanitizeInput($conn, $_POST["visionReadingR"] ?? null);
$colourVision = sanitizeInput($conn, $_POST["colourVision"] ?? null);
$systemsExaminations = sanitizeInput($conn, $_POST["systemsExaminations"] ?? null);
$abnormalFindings = sanitizeInput($conn, $_POST["abnormalFindings"] ?? null);
$physicalActivity = sanitizeInput($conn, $_POST["physicalActivity"] ?? null);
$excludedActivities = sanitizeInput($conn, $_POST["excludedActivities"] ?? null);
$physicianName = sanitizeInput($conn, $_POST["physicianName"] ?? null);
$physicianContact = sanitizeInput($conn, $_POST["physicianContact"] ?? null);
$physicianAddress = sanitizeInput($conn, $_POST["physicianAddress"] ?? null);
$physicianSignature = sanitizeInput($conn, $_POST["physicianSignature"] ?? null);
$physicianDate = sanitizeInput($conn, $_POST["medicalPractitionerDate"] ?? null);

$sqlMedical = "INSERT INTO medical_information (application_id, allergies, chronicConditions, otherConditions, otherDifficulties, hospitalization, dentistVisits, routineMedicines, emergencyMedication, specifiedMedicines, specifiedEmergencyMed, lastVaccination, height, weight, pulse, bp, nutritionalStatus, hearingScreening, visionDistanceL, visionDistanceR, visionReadingL, visionReadingR, colourVision, systemsExaminations, abnormalFindings, physicalActivity, excludedActivities, physicianName, physicianContact, physicianAddress, physicianSignature, physicianDate) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmtMedical = $conn->prepare($sqlMedical);
$stmtMedical->bind_param("isssssssssssssssssssssssssssssss", $applicationId, $allergies, $chronicConditions, $otherConditions, $otherDifficulties, $hospitalization, $dentistVisits, $routineMedicines, $emergencyMedication, $specifiedMedicines, $specifiedEmergencyMed, $lastVaccination, $height, $weight, $pulse, $bp, $nutritionalStatus, $hearingScreening, $visionDistanceL, $visionDistanceR, $visionReadingL, $visionReadingR, $colourVision, $systemsExaminations, $abnormalFindings, $physicalActivity, $excludedActivities, $physicianName, $physicianContact, $physicianAddress, $physicianSignature, $physicianDate);
if ($stmtMedical->execute()) {
    $stmtMedical->close();
    echo "Data saved successfully!";
     header("Location: " . $_SERVER['REQUEST_URI']);
} else {
    echo "Error adding medical information: " . $stmtMedical->error;
}
        } else {
            echo "Error adding emergency contacts: " . $stmtEmergency->error;
        }
    } else {
        echo "Error: " . $stmt->error;
    }
}








// Close connection
$conn->close();
?>