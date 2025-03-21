<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Application Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
 
            <link rel="stylesheet" href="userstyle.css">


    
</head>
<body>

<div class="content">
    <div class="container py-4">
        <div class="alert alert-info text-center">
            Please Note: You MUST fill all Form Sections appropriately before you submit your Application Form!
        </div>
        <form action="test.php" method="post" enctype="multipart/form-data" id="applicationFormMain">
            <div class="accordion" id="applicationAccordion">

                <div class="accordion-item mb-3">
                    <h2 class="accordion-header d-flex align-items-center">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#applicationForm" aria-expanded="true">Application Form</button>
                        <span class="status-text not-filled" id="statusApplicationForm">NOT FILLED</span>
                    </h2>
                    <div id="applicationForm" class="accordion-collapse collapse show" data-bs-parent="#applicationAccordion">
                        <div class="accordion-body">
                            <div class="row">
                            <label for="student" style="background-color: green; color: white; padding: 5px; border-radius: 3px;">
                                                                         Information about the student
                                                                                                            </label>

                                <div class="col-md-6 mb-3"> <label>First Name:</label> <input type="text" class="form-control" name="firstName"> </div>
                                <!-- <div class="col-md-6 mb-3"> <label>Middle Name:</label> <input type="text" class="form-control" name="middleName"> </div> -->
                                <div class="col-md-6 mb-3"> <label>Surname:</label> <input type="text" class="form-control" name="surname"> </div>
                                <div class="col-md-6 mb-3"> <label>Name student is commonly called by:</label> <input type="text" class="form-control" name="commonName"> </div>
                                <div class="col-md-6 mb-3"> <label>Gender:</label> <select class="form-select" name="gender"> <option value="Male">Male</option> <option value="Female">Female</option>  </select> </div>
                                <div class="col-md-6 mb-3"> <label>Country of Birth:</label> <input type="text" class="form-control" name="countryOfBirth"> </div>
                                <div class="col-md-6 mb-3"> <label>Date of Birth:</label> <input type="date" class="form-control" name="dateOfBirth"> </div>
                               
                                <!-- <div class="col-md-6 mb-3"> <label>Application Date:</label> <input type="date" class="form-control" name="applicationDate"> </div> -->
                                <div class="col-md-6 mb-3">
    <label for="applyingToYear">Applying to Year:</label>
    <select class="form-select" name="applyingToYear" id="applyingToYear">
        <option value="">Select Year</option>
        <option value="7">Year 7</option>
        <option value="8">Year 8</option>
        <option value="9">Year 9</option>
        <option value="10">Year 10</option>
        <option value="11">Year 11</option>
        <option value="12">Year 12</option>
        <option value="13">Year 13</option>
    </select>
</div>


<div class="col-md-6 mb-3">
    <label>Academic Year:</label>
    <select class="form-select" name="academicYear" id="academicYearDropdown">
        <option value="">Select Academic Year</option>
    </select>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        let select = document.getElementById("academicYearDropdown");
        let currentYear = new Date().getFullYear();
        
        for (let i = 0; i < 60; i++) { // Generates 10 years into the future
            let startYear = currentYear + i;
            let endYear = startYear + 1;
            let academicYear = `${startYear}-${endYear}`;
            
            let option = document.createElement("option");
            option.value = academicYear;
            option.textContent = academicYear;
            select.appendChild(option);
        }
    });
</script>
                      

<!-- <div class="col-md-6 mb-3"> <label>Academic Year:</label> <input type="text" class="form-control" name="academicYear"> </div> -->
                                
                                <div class="col-md-6 mb-3"> <label>Nationality:</label> <input type="text" class="form-control" name="nationality"> </div>
                                <div class="col-md-6 mb-3"> <label>Current Place Of Recidence</label> <input type="text" class="form-control" name="otherNationalities"> </div>
                                <div class="col-md-6 mb-3"> <label>Languages Spoken at Home:</label> <input type="text" class="form-control" name="languagesSpoken"> </div>
                                <div class="col-md-6 mb-3"> <label>Funding:</label> <select class="form-select" name="funding"> <option value="Organisation funded">Organisation funded</option> <option value="Self-funded">Self-funded</option> </select> </div>
                                
                            <div class="row mb-3">
    <div class="col-md-4">
        <label>Passport Number:</label>
        <input type="text" class="form-control" name="passportNumber">
    </div>
    <div class="col-md-4">
        <label>Date of Issue:</label>
        <input type="date" class="form-control" name="dateOfIssue">
    </div>
    <div class="col-md-4">
        <label>Date of Expiry:</label>
        <input type="date" class="form-control" name="dateOfExpiry">
    </div>
</div>
<label for="school" style="background-color: green; color: white; padding: 5px; border-radius: 3px;">
    School Information
</label>

<!-- Current School -->
<div class="col-md-12 mb-3">
    <label>Name of School Attended 1:</label>
    <input type="text" class="form-control" name="currentSchool">
</div>

<div class="col-md-6 mb-3">
    <label>School Email:</label>
    <input type="email" class="form-control" name="currentSchoolEmail">
</div>

<div class="col-md-6 mb-3">
    <label>School Phone Number:</label>
    <input type="tel" class="form-control" name="currentSchoolPhone">
</div>

<div class="col-md-6 mb-3">
    <label>Years Attended (From):</label>
    <input type="date" class="form-control" name="schoolTwoFrom">
</div>

<div class="col-md-6 mb-3">
    <label>Years Attended (To):</label>
    <input type="date" class="form-control" name="schoolTwoTo">
</div>

<!-- School One (Compulsory) -->
<div class="col-md-12 mb-3">
    <label>Name of School Attended 2:</label>
    <input type="text" class="form-control" name="currentSchool">
</div>

<div class="col-md-6 mb-3">
    <label>School Email:</label>
    <input type="email" class="form-control" name="currentSchoolEmail">
</div>

<div class="col-md-6 mb-3">
    <label>School Phone Number:</label>
    <input type="tel" class="form-control" name="currentSchoolPhone">
</div>

<div class="col-md-6 mb-3">
    <label>Years Attended (From):</label>
    <input type="date" class="form-control" name="schoolTwoFrom">
</div>

<div class="col-md-6 mb-3">
    <label>Years Attended (To):</label>
    <input type="date" class="form-control" name="schoolTwoTo">
</div>

<label style="background-color: green; color: white; padding: 5px; border-radius: 3px;">English Proficiency Placement</label>
                <div class="col-md-6 mb-3"> <label>Reading:</label> <select class="form-select" name="reading"> <option>Excellent</option> <option>Good</option> <option>Fair</option> <option>Poor</option> </select> </div>
                <div class="col-md-6 mb-3"> <label>Writing:</label> <select class="form-select" name="writing"> <option>Excellent</option> <option>Good</option> <option>Fair</option> <option>Poor</option> </select> </div>
                <div class="col-md-6 mb-3"> <label>Speaking:</label> <select class="form-select" name="speaking"> <option>Excellent</option> <option>Good</option> <option>Fair</option> <option>Poor</option> </select> </div>
                <div class="col-md-6 mb-3"> <label>Special Educational or Physical Needs:</label> <textarea class="form-control" name="specialNeeds"></textarea> </div>

                <label class="form-label" style="background-color: green; color: white; padding: 5px; border-radius: 3px;">Parent / Guardian Contact Details</label>
                
                <div class="col-md-12 mb-3"> <label>Name of Father or Legal Guardian:</label> <input type="text" class="form-control" name="fatherName"> </div>
                <div class="col-md-6 mb-3"> <label>Nationality:</label> <input type="text" class="form-control" name="fatherNationality"> </div>
                <div class="col-md-6 mb-3"> <label>Home Telephone:</label> <input type="tel" class="form-control" name="fatherPhone"> </div>
                <div class="col-md-6 mb-3"> <label>Mobile:</label> <input type="tel" class="form-control" name="fatherMobile"> </div>
                <div class="col-md-6 mb-3"> <label>E-Mail Address:</label> <input type="email" class="form-control" name="fatherEmail"> </div>
                
                <div class="col-md-12 mb-3"> <label>Name of Mother or Legal Guardian:</label> <input type="text" class="form-control" name="motherName"> </div>
                <div class="col-md-6 mb-3"> <label>Nationality:</label> <input type="text" class="form-control" name="motherNationality"> </div>
                <div class="col-md-6 mb-3"> <label>Home Telephone:</label> <input type="tel" class="form-control" name="motherPhone"> </div>
                <div class="col-md-6 mb-3"> <label>Mobile:</label> <input type="tel" class="form-control" name="motherMobile"> </div>
                <div class="col-md-6 mb-3"> <label>E-Mail Address:</label> <input type="email" class="form-control" name="motherEmail"> </div>

                            </div>
                            <button type="button" class="btn btn-primary" onclick="saveSection('applicationForm', 'statusApplicationForm')">SAVE</button>
                        </div>
                    </div>
                </div>

                <div class="accordion-item mb-3">
                    <h2 class="accordion-header d-flex align-items-center">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#emergencyForm">Student Emergency Information</button>
                        <span class="status-text not-filled" id="statusEmergencyForm">NOT FILLED</span>
                    </h2>
                    <div id="emergencyForm" class="accordion-collapse collapse" data-bs-parent="#applicationAccordion">
                        <div class="accordion-body">
                            <!-- <div class="mb-3"> <label class="form-label">Student Names:</label> <div class="row"> <div class="col-md-4 mb-2"> <input type="text" class="form-control" placeholder="First Name" name="emergencyFirstName"> </div> <div class="col-md-4 mb-2"> <input type="text" class="form-control" placeholder="Middle Name" name="emergencyMiddleName"> </div> <div class="col-md-4 mb-2"> <input type="text" class="form-control" placeholder="Surname" name="emergencySurname"> </div> </div> </div> -->
                            <div class="mb-3"> <label class="form-label">Name(s) of Parents / Legal Guardians</label> <input type="text" class="form-control" placeholder="Enter names" name="parentGuardianNames"> </div>
                            <div class="row mb-3"> <div class="col-md-6"> <label class="form-label">Residential Physical Address</label> <input type="text" class="form-control" placeholder="Enter address" name="residentialAddress"> </div> <div class="col-md-6"> <label class="form-label">Landmark & Proximity</label> <input type="text" class="form-control" placeholder="Enter landmarks" name="landmark"> </div> </div>
                            <div class="row mb-3"> <div class="col-md-6"> <label class="form-label">Home Telephone</label> <input type="text" class="form-control" placeholder="Enter home telephone" name="homeTelephone"> </div> <div class="col-md-6"> <label class="form-label">Mobile Telephone</label> <input type="text" class="form-control" placeholder="Enter mobile telephone" name="mobileTelephone"> </div> </div>
                            <div class="mb-3"> <label class="form-label">Alternative Contacts (if primary contacts cannot be reached):</label> </div>
                            <div class="row mb-3"> <div class="col-md-6"> <label class="form-label">Family or Office Name</label> <input type="text" class="form-control" placeholder="Enter family/office name" name="alternativeContactName"> </div> <div class="col-md-6"> <label class="form-label">Physical Address</label> <input type="text" class="form-control" placeholder="Enter alternative address" name="alternativeAddress"> </div> </div>
                            <div class="row mb-3"> <div class="col-md-12"> <label class="form-label">Landmark & Proximity for Alternative Address</label> <input type="text" class="form-control" placeholder="Enter landmarks" name="alternativeLandmark"> </div> </div>
                            <div class="row mb-3"> <div class="col-md-6"> <label class="form-label">Home/Office Telephone</label> <input type="text" class="form-control" placeholder="Enter telephone" name="alternativeTelephone"> </div> <div class="col-md-6"> <label class="form-label">Mobile</label> <input type="text" class="form-control" placeholder="Enter mobile" name="alternativeMobile"> </div> </div>
                            <button type="button" class="btn btn-primary" onclick="saveSection('emergencyForm', 'statusEmergencyForm')">SAVE</button>
                        </div>
                    </div>
                </div>







                
                <div class="accordion-item mb-3">
    <h2 class="accordion-header d-flex align-items-center">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#medicalForm">General Student  &amp; Pysical and medical information</button>
        <span class="status-text not-filled" id="statusMedicalForm">NOT FILLED</span>
    </h2>
    <div id="medicalForm" class="accordion-collapse collapse" data-bs-parent="#applicationAccordion">
        <div class="accordion-body">
            <h5 class="mb-3">Health Information</h5>
            <div class="mb-3">
                <label class="form-label">Allergies (Food, medicine, insects or others):</label>
                <textarea class="form-control" rows="2" placeholder="List any allergies here" name="allergies"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Chronic – Recurring Health Conditions (Tick where applicable):</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="asthma" value="Asthma" name="chronicConditions[]">
                    <label class="form-check-label" for="asthma">Asthma</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="diabetes" value="Diabetes" name="chronicConditions[]">
                    <label class="form-check-label" for="diabetes">Diabetes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="epilepsy" value="Epilepsy" name="chronicConditions[]">
                    <label class="form-check-label" for="epilepsy">Epilepsy</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="hepatitis" value="Hepatitis" name="chronicConditions[]">
                    <label class="form-check-label" for="hepatitis">Hepatitis</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="migraines" value="Migraines" name="chronicConditions[]">
                    <label class="form-check-label" for="migraines">Migraines</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="sickleCell" value="Sickle Cell" name="chronicConditions[]">
                    <label class="form-check-label" for="sickleCell">Sickle Cell</label>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Other (please specify):</label>
                    <input type="text" class="form-control" placeholder="Other conditions" name="otherConditions">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Other Difficulties:</label>
                    <input type="text" class="form-control" placeholder="Other difficulties (please specify)" name="otherDifficulties">
                </div>
            </div>

        
            <div class="row mb-3">
    <div class="col-md-6">
        <label class="form-label">Has your child had any operations or hospitalization?</label>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="hospitalization" id="hospitalYes" value="Yes">
                    <label class="form-check-label" for="hospitalYes">Yes</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="hospitalization" id="hospitalNo" value="No">
                    <label class="form-check-label" for="hospitalNo">No</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <label class="form-label">Does your child visit a dentist at least once a year?</label>
        <div class="row">
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="dentistVisits" id="dentistYes" value="Yes">
                    <label class="form-check-label" for="dentistYes">Yes</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="dentistVisits" id="dentistNo" value="No">
                    <label class="form-check-label" for="dentistNo">No</label>
                </div>
            </div>
        </div>
    </div>
</div>




            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Does your child routinely take medicines?</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="routineMedicines" id="medicinesYes" value="Yes">
                                <label class="form-check-label" for="medicinesYes">Yes</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="routineMedicines" id="medicinesNo" value="No">
                                <label class="form-check-label" for="medicinesNo">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Does your child require emergency medication (e.g., epi pen, asthma inhaler, allergy medication etc.)?</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="emergencyMedication" id="emergencyMedYes" value="Yes">
                                <label class="form-check-label" for="emergencyMedYes">Yes</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="emergencyMedication" id="emergencyMedNo" value="No">
                                <label class="form-check-label" for="emergencyMedNo">No</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">If yes, please specify which medicines:</label>
                    <input type="text" class="form-control" placeholder="Specify medicines" name="specifiedMedicines">
                </div>
                <div class="col-md-6">
                    <label class="form-label">If yes, please specify emergency medication:</label>
                    <input type="text" class="form-control" placeholder="Specify emergency medication" name="specifiedEmergencyMed">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">When was the last yellow fever and tetanus shot done?</label>
                    <input type="text" class="form-control" placeholder="Enter date or details" name="lastVaccination">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Attach a copy of the Vaccination card:</label>
                    <input type="file" class="form-control" name="vaccinationCard">
                </div>
            </div>

            <hr>
            <!-- <h5 class="mb-3">Physical Examination Report (Completed by a medical practitioner)</h5>
            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-label">Height</label>
                    <input type="text" class="form-control" placeholder="Height" name="height">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Weight</label>
                    <input type="text" class="form-control" placeholder="Weight" name="weight">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Pulse</label>
                    <input type="text" class="form-control" placeholder="Pulse" name="pulse">
                </div>
                <div class="col-md-3">
                    <label class="form-label">BP</label>
                    <input type="text" class="form-control" placeholder="Blood Pressure" name="bp">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nutritional Status</label>
                    <input type="text" class="form-control" placeholder="Enter nutritional status" name="nutritionalStatus">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Hearing Screening</label>
                    <input type="text" class="form-control" placeholder="Hearing Screening" name="hearingScreening">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Vision Screening - Distance Vision – L</label>
                    <input type="text" class="form-control" placeholder="Left" name="visionDistanceL">
                </div>
                <div class="col-md-6">
                    <label class="form-label">R</label>
                    <input type="text" class="form-control" placeholder="Right" name="visionDistanceR">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Vision Screening - Reading – L</label>
                    <input type="text" class="form-control" placeholder="Left" name="visionReadingL">
                </div>
                <div class="col-md-6">
                    <label class="form-label">R</label>
                    <input type="text" class="form-control" placeholder="Right" name="visionReadingR">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Colour Vision</label>
                <input type="text" class="form-control" placeholder="Colour Vision" name="colourVision">
            </div>
            <div class="mb-3">
                <label class="form-label">Systems Examinations</label>
                <textarea class="form-control" rows="3" placeholder="Enter details of system examinations" name="systemsExaminations"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Summary of Abnormal Findings</label>
                <textarea class="form-control" rows="2" placeholder="Enter abnormal findings" name="abnormalFindings"></textarea>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Is there any medical condition that would prevent this student from safely participating in any physical activities or field trips?</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="physicalActivity" id="physicalActivityYes" value="Yes">
                                <label class="form-check-label" for="physicalActivityYes">Yes</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="physicalActivity" id="physicalActivityNo" value="No">
                                <label class="form-check-label" for="physicalActivityNo">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">If yes, please explain:</label>
                    <textarea class="form-control" rows="2" placeholder="Explain medical condition" name="excludedActivities"></textarea>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Medical Practitioner's Name</label>
                <input type="text" class="form-control" placeholder="Medical Practitioner's Name" name="physicianName">
            </div>
            <div class="mb-3">
                <label class="form-label">Medical Practitioner's Contact</label>
                <input type="text" class="form-control" placeholder="Medical Practitioner's Contact" name="physicianContact">
            </div>
            <div class="mb-3">
                <label class="form-label">Medical Practitioner's Address</label>
                <input type="text" class="form-control" placeholder="Medical Practitioner's Address" name="physicianAddress">
            </div>
            <div class="mb-3">
                <label class="form-label">Medical Practitioner's Signature</label>
                <input type="text" class="form-control" placeholder="Medical Practitioner's Signature" name="physicianSignature">
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="medicalPractitionerDate">
            </div> -->

            <button type="button" class="btn btn-primary" onclick="saveSection('medicalForm', 'statusMedicalForm')">SAVE</button>
        </div>
    </div>
</div>



                <div class="accordion-item mb-3">
                    <h2 class="accordion-header d-flex align-items-center">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mediaConsent">Media and Release Consent Form</button>
                        <span class="status-text not-filled" id="statusMediaConsent">NOT FILLED</span>
                    </h2>
                    <div id="mediaConsent" class="accordion-collapse collapse" data-bs-parent="#applicationAccordion">
                        <div class="accordion-body">
                            <div class="mb-3"> <label class="form-label">Consent Given:</label>
                                <div class="row"> <div class="col-md-6"> <div class="form-check"> <input class="form-check-input" type="radio" name="consent" id="consentYes" value="Yes"> <label class="form-check-label" for="consentYes">Yes</label> </div> </div> <div class="col-md-6"> <div class="form-check"> <input class="form-check-input" type="radio" name="consent" id="consentNo" value="No"> <label class="form-check-label" for="consentNo">No</label> </div> </div> </div>
                            </div>
                            <div class="mb-3"> <label class="form-label">Upload Signed Consent Form:</label> <input type="file" class="form-control" name="consentForm"> </div>
                            <button type="button" class="btn btn-primary" onclick="saveSection('mediaConsent', 'statusMediaConsent')">SAVE</button>
                        </div>
                    </div>
                </div>

                <!-- <div class="accordion-item mb-3">
                    <h2 class="accordion-header d-flex align-items-center">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#transcript">School Transcript/Report Card</button>
                        <span class="status-text not-filled" id="statusTranscript">NOT FILLED</span>
                    </h2>
                    <div id="transcript" class="accordion-collapse collapse" data-bs-parent="#applicationAccordion">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label>Upload Transcript:</label>
                                <input type="file" class="form-control" name="transcript">
                            </div>
                            <button type="button" class="btn btn-primary" onclick="saveSection('transcript', 'statusTranscript')">SAVE</button>
                        </div>
                    </div>
                </div> -->


                <div class="accordion-item mb-3">
    <h2 class="accordion-header d-flex align-items-center">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#transcript">School Transcripts/Report Cards</button>
        <span class="status-text not-filled" id="statusTranscript">NOT FILLED</span>
    </h2>
    <div id="transcript" class="accordion-collapse collapse" data-bs-parent="#applicationAccordion">
        <div class="accordion-body">
            <div class="mb-3">
                <label class="form-label" style="background-color: green; color: white; padding: 5px; border-radius: 3px; display: block; width: 100%; margin-bottom: 10px;">Current School (Compulsory)</label>

                <label class="form-label">Upload Termly Report Cards:</label>
                <input type="file" class="form-control" name="currentSchoolTranscript[]" multiple>
                <small class="form-text text-muted">Please upload all termly report cards for the Current School.</small>
            </div>

            <div class="mb-3">
                <label class="form-label" style="background-color: green; color: white; padding: 5px; border-radius: 3px; display: block; width: 100%; margin-bottom: 10px;">Previous School (Optional)</label>

                <label class="form-label">Upload Report Card:</label>
                <input type="file" class="form-control" name="previousSchoolTranscript">
                <small class="form-text text-muted">Upload the report card for the Previous School (if applicable).</small>
            </div>

            <div class="mb-3">
                <label class="form-label">Additional Information (Optional):</label>
                <textarea class="form-control" name="transcriptAdditionalInfo"></textarea>
                <small class="form-text text-muted">Please provide any additional information regarding your academic records.</small>
            </div>

            <button type="button" class="btn btn-primary" onclick="saveSection('transcript', 'statusTranscript')">SAVE</button>
        </div>
    </div>
</div>








                <!-- <div class="accordion-item mb-3">
                    <h2 class="accordion-header d-flex align-items-center">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#passportCopies">Parent(s) and Student(s) Passport Copies</button>
                        <span class="status-text not-filled" id="statusPassportCopies">NOT FILLED</span>
                    </h2>
                    <div id="passportCopies" class="accordion-collapse collapse" data-bs-parent="#applicationAccordion">
                        <div class="accordion-body">
                            <div class="mb-3">
                                <label>Upload Passport Copies:</label>
                                <input type="file" class="form-control" name="passport_copies">
                            </div>
                            <button type="button" class="btn btn-primary" onclick="saveSection('passportCopies', 'statusPassportCopies')">SAVE</button>
                        </div>
                    </div>
                </div> -->
                <div class="accordion-item mb-3">
    <h2 class="accordion-header d-flex align-items-center">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#passportCopies">Parent(s) and Student(s) Passport Copies</button>
        <span class="status-text not-filled" id="statusPassportCopies">NOT FILLED</span>
    </h2>
    <div id="passportCopies" class="accordion-collapse collapse" data-bs-parent="#applicationAccordion">
        <div class="accordion-body">
            <div class="mb-3">
                <label class="form-label" style="background-color: green; color: white; padding: 5px; border-radius: 3px; display: block; width: 100%; margin-bottom: 10px;">Student Passport Copy</label>
                <label class="form-label">Upload Student Passport:</label>
                <input type="file" class="form-control" name="studentPassportCopy">
            </div>

            <div class="mb-3">
                <label class="form-label" style="background-color: green; color: white; padding: 5px; border-radius: 3px; display: block; width: 100%; margin-bottom: 10px;">Parent 1 Passport Copy</label>
                <label class="form-label">Upload Parent 1 Passport:</label>
                <input type="file" class="form-control" name="parent1PassportCopy">
            </div>

            <div class="mb-3">
                <label class="form-label" style="background-color: green; color: white; padding: 5px; border-radius: 3px; display: block; width: 100%; margin-bottom: 10px;">Parent 2 Passport Copy (Optional)</label>
                <label class="form-label">Upload Parent 2 Passport:</label>
                <input type="file" class="form-control" name="parent2PassportCopy">
                <small class="form-text text-muted">Upload Parent 2 Passport Copy if applicable.</small>
            </div>

            <button type="button" class="btn btn-primary" onclick="saveSection('passportCopies', 'statusPassportCopies')">SAVE</button>
        </div>
    </div>
</div>

<div class="accordion-item mb-3">
    <h2 class="accordion-header d-flex align-items-center">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#photos">Passport Size Student Photos</button>
        <span class="status-text not-filled" id="statusPhotos">NOT FILLED</span>
    </h2>
    <div id="photos" class="accordion-collapse collapse" data-bs-parent="#applicationAccordion">
        <div class="accordion-body">
            <div class="mb-3">
                <label class="form-label">Upload Photo:</label>
                <input type="file" class="form-control" name="student_photos" multiple>
            </div>
            <p>Please upload passport-sized photo of the student. When the student attends school, they will be required to provide four (4) passport-sized photographs.</p>
            <button type="button" class="btn btn-primary" onclick="saveSection('photos', 'statusPhotos')">SAVE</button>
        </div>
    </div>
</div>


<div class="accordion-item mb-3">
    <h2 class="accordion-header d-flex align-items-center">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#additionalDocuments">Additional Documents (Optional)</button>
        <span class="status-text not-filled" id="statusAdditionalDocuments">NOT FILLED</span>
    </h2>
    <div id="additionalDocuments" class="accordion-collapse collapse" data-bs-parent="#applicationAccordion">
        <div class="accordion-body">
            <div class="mb-3">
                <label class="form-label">Upload Additional Documents:</label>
                <input type="file" class="form-control" name="additional_documents[]" multiple>
            </div>
            <p>Please upload any additional documents you wish to include (e.g., recommendation letters, awards, etc.).</p>
            <button type="button" class="btn btn-primary" onclick="saveSection('additionalDocuments', 'statusAdditionalDocuments')">SAVE</button>
        </div>
    </div>
</div>
 </div>
 <div class="text-center mt-4">
    <button type="submit" class="btn btn-primary btn-lg">Submit Application</button>
</div>
        </form>
    </div>
</div>

<script>
    function saveSection(sectionId, statusId) {
        let statusElement = document.getElementById(statusId);
        statusElement.classList.remove("not-filled");
        statusElement.classList.add("filled");
        statusElement.innerText = "FILLED";
        // Here you would add code to save the form data of the section to local storage or a database.
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>