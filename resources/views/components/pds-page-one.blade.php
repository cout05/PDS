<div class="page">
    <div class="header">
        <div class="form-number">CS Form No. 212 <span style="font-weight: normal;"><br>Revised 2025</span></div>
        <div class="title">PERSONAL DATA SHEET</div>
    </div>
    <div class="warning">
        WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.
    </div>
    <div class="instructions">
        READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.<br>
        <span style="font-weight: normal; text-decoration: underline;">
            Print legibly if accomplished through own handwriting. Check appropriate boxes (□) and use separate sheet if necessary. Indicate N/A if not applicable.</span> DO NOT ABBREVIATE.
    </div>

    <div class="section-header">I. PERSONAL INFORMATION</div>
    <table>
        <tr>
            <th colspan="2" style="width: 15%;">2. SURNAME</th>
            <td colspan="4" style="width: 50%;"><input type="text" class="input-text" :value="surname" readonly></td>
        </tr>
        <tr>
            <th colspan="2">FIRST NAME</th>
            <td colspan="3"><input type="text" class="input-text" :value="first_name" readonly></td>
            <div style="display: flex;">
                <th colspan="1">NAME EXTENSION (JR., SR.) <input type="text" class="input-text" :value="name_extension" readonly></th>
            </div>
        </tr>
        <tr>
            <th colspan="2">MIDDLE NAME</th>
            <td colspan="4"><input type="text" class="input-text" :value="middle_name" readonly></td>
        </tr>
        <tr>
            <th colspan="2">3. DATE OF BIRTH<br>(dd/mm/yyyy)</th>
            <td colspan="2"><input type="text" class="input-text" :value="date_of_birth" readonly></td>
            <th rowspan="1" style="border-bottom: none;">16. CITIZENSHIP</th>
            <td rowspan="2">
                <div style="display: flex; align-items: start; gap: 10%;">
                    <label class="checkbox-container"><input type="checkbox" :checked="citizenship === 'Filipino'" onclick="return false;">Filipino</label>
                    <div>
                        <label class="checkbox-container"><input type="checkbox" :checked="citizenship === 'Dual'" onclick="return false;">Dual Citizenship</label>
                        <div style="margin-top: 5px; display: flex; gap: 20px;">
                            <label class="checkbox-container"><input type="checkbox" onclick="return false;">By Birth</label>
                            <label class="checkbox-container"><input type="checkbox" onclick="return false;">By naturalization</label>
                        </div>
                        <div style="margin-top: 5px;">Pls. indicate country:</div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="2">4. PLACE OF BIRTH</th>
            <td colspan="2"><input type="text" class="input-text" :value="place_of_birth" readonly></td>
            <td style="font-size:  8px; background-color: #f0f0f0; border: none; text-align: center;">If holder of dual citizenship,</td>
        </tr>
        <tr>
            <th colspan="2">5. SEX</th>
            <td colspan="2">
                <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                    <label class="checkbox-container"><input type="checkbox" :checked="sex === 'Male'" onclick="return false;">Male</label>
                    <label class="checkbox-container"><input type="checkbox" :checked="sex === 'Female'" onclick="return false;">Female</label>
                </div>
            </td>
            <td style="font-size: 8px; background-color: #f0f0f0; border-top: none; text-align: center;">please indicate the details.</td>
            <td><input type="text" class="input-text"></td>
        </tr>
        <tr>
            <th colspan="2">6 CIVIL STATUS</th>
            <td colspan="2">
                <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                    <div>
                        <label class="checkbox-container"><input type="checkbox" :checked="civil_status === 'Single'" onclick="return false;">Single</label>
                        <label class="checkbox-container"><input type="checkbox" :checked="civil_status === 'Widowed'" onclick="return false;">Widowed</label>
                        <label class="checkbox-container"><input type="checkbox" :checked="civil_status === 'Others'" onclick="return false;">Other/s:</label>
                    </div>
                    <div>
                        <label class="checkbox-container"><input type="checkbox" :checked="civil_status === 'Married'" onclick="return false;">Married</label>
                        <label class="checkbox-container"><input type="checkbox" :checked="civil_status === 'Separated'" onclick="return false;">Separated</label>
                    </div>
                </div>
            </td>
            <th rowspan="2" style="border-bottom: none;">17. RESIDENTIAL ADDRESS</th>
            <td rowspan="2">
                <div style="display: flex; justify-content: space-evenly;">
                    <div class="address">
                        <div><input type="text" class="input-text" :value="residential_address.house_no" readonly></div>
                        <div class="small">House/Block/Lot No.</div>
                    </div>
                    <div class="address">
                        <div><input type="text" class="input-text" :value="residential_address.street" readonly></div>
                        <div class="small">Street</div>
                    </div>
                </div>
                <div style="display: flex; justify-content: space-evenly;">
                    <div class="address">
                        <div><input type="text" class="input-text" :value="residential_address.subdivision" readonly></div>
                        <div class="small">Subdivision/Village</div>
                    </div>
                    <div class="address">
                        <div><input type="text" class="input-text" :value="residential_address.barangay" readonly></div>
                        <div class="small">Barangay</div>
                    </div>
                </div>
                <div style="display: flex; justify-content: space-evenly;">
                    <div class="address">
                        <div><input type="text" class="input-text" :value="residential_address.city" readonly></div>
                        <div class="small">City/Municipality</div>
                    </div>
                    <div class="address">
                        <div><input type="text" class="input-text" :value="residential_address.province" readonly></div>
                        <div class="small">Province</div>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="2">7. HEIGHT (m)</th>
            <td colspan="2"><input type="number" class="input-text" :value="height_m" readonly></td>
        </tr>
        <tr>
            <th colspan="2">8. WEIGHT (kg)</th>
            <td colspan="2"><input type="number" class="input-text" :value="weight_kg" readonly></td>
            <td style="background-color: #f0f0f0; border: none; text-align: center;">ZIPCODE</td>
            <td style="text-align: center; font-weight: bold;"><input type="text" class="input-text" :value="residential_address.zipcode" readonly></td>
        </tr>
        <tr>
            <th colspan="2">9. BLOOD TYPE</th>
            <td colspan="2"><input type="text" class="input-text" :value="blood_type" readonly></td>
            <th rowspan="3" style="border-bottom: none;">18. PERMANENT ADDRESS</th>
            <td rowspan="3">
                <div style="display: flex; justify-content: space-evenly;">
                    <div class="address">
                        <div><input type="text" class="input-text" :value="permanent_address.house_no" readonly></div>
                        <div class="small">House/Block/Lot No.</div>
                    </div>
                    <div class="address">
                        <div><input type="text" class="input-text" :value="permanent_address.street" readonly></div>
                        <div class="small">Street</div>
                    </div>
                </div>
                <div style="display: flex; justify-content: space-evenly;">
                    <div class="address">
                        <div><input type="text" class="input-text" :value="permanent_address.subdivision" readonly></div>
                        <div class="small">Subdivision/Village</div>
                    </div>
                    <div class="address">
                        <div><input type="text" class="input-text" :value="permanent_address.barangay" readonly></div>
                        <div class="small">Barangay</div>
                    </div>
                </div>
                <div style="display: flex; justify-content: space-evenly;">
                    <div class="address">
                        <div><input type="text" class="input-text" :value="permanent_address.city" readonly></div>
                        <div class="small">City/Municipality</div>
                    </div>
                    <div class="address">
                        <div><input type="text" class="input-text" :value="permanent_address.province" readonly></div>
                        <div class="small">Barangay</div> <!-- Note: index.html label says Barangay here too, should likely be Province or it's just the label -->
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th colspan="2">10. UMID ID NO.</th>
            <td colspan="2"><input type="text" class="input-text" :value="umid_no" readonly></td>
        </tr>
        <tr>
            <th colspan="2">11. PAG-IBIG ID NO.</th>
            <td colspan="2"><input type="text" class="input-text" :value="pagibig_no" readonly></td>
        </tr>
        <tr>
            <th colspan="2">12. PHILHEALTH NO.</th>
            <td colspan="2"><input type="text" class="input-text" :value="philhealth_no" readonly></td>
            <td style="border: none; background-color: #f0f0f0; text-align: center;">ZIPCODE</td>
            <td><input type="text" class="input-text" :value="permanent_address.zipcode" readonly></td>
        </tr>
        <tr>
            <th colspan="2">13. PhilSys Number (PSN):</th>
            <td colspan="2"><input type="text" class="input-text" :value="psn" readonly></td>
            <th>19. TELEPHONE NO.</th>
            <td><input type="text" class="input-text" :value="telephone_no" readonly></a></td>
        </tr>
        <tr>
            <th colspan="2">14. TIN NO.</th>
            <td colspan="2"><input type="text" class="input-text" :value="tin_no" readonly></td>
            <th>20. MOBILE NO.</th>
            <td><input type="text" class="input-text" :value="mobile_no" readonly></td>
        </tr>
        <tr>
            <th colspan="2">15. AGENCY EMPLOYEE NO.</th>
            <td colspan="2"><input type="text" class="input-text" :value="agency_employee_no" readonly></td>
            <th rowspan="2">21. E-MAIL ADDRESS (if any)</th>
            <td rowspan="2"><input type="text" class="input-text" :value="email" readonly></a></td>
        </tr>
    </table>

    <div class="section-header">II. FAMILY BACKGROUND</div>
    <table>
        <tr>
            <th colspan="2" style="width: 15%;border: none">22. SPOUSE'S SURNAME</th>
            <td colspan="3" style="width: 35%;"><div><input type="text" class="input-text" :value="spouse.surname" readonly></div></td>
            <th colspan="2" style="width: 25%;">23. NAME OF CHILDREN (Write full name and list all)</th>
            <th style="width: 15%;">DATE OF BIRTH (mm/dd/yyyy)</th>
        </tr>
        <tr>
            <th colspan="2" style="border: none">FIRST NAME</th>
            <td colspan="1" style="width: 20%;"><div><input type="text" class="input-text" :value="spouse.first_name" readonly></div></td>
            <th colspan="2"><div style="font-size: 8px;">NAME EXTENSION (JR., SR)<input type="text" class="input-text" :value="spouse.name_extension" readonly style="background-color: transparent;"></div></th>
            <td colspan="2"><div><input type="text" class="input-text" :value="getChild(0).full_name" readonly></div></td>
            <td style="text-align: center;"><div><input type="text" class="input-text" :value="getChild(0).date_of_birth" readonly></div></td>
        </tr>
        <tr>
            <th colspan="2" style="border: none">MIDDLE NAME</th>
            <td colspan="3"><div><input type="text" class="input-text" :value="spouse.middle_name" readonly></div></td>
            <td colspan="2"><div><input type="text" class="input-text" :value="getChild(1).full_name" readonly></div></td>
            <td><div><input type="text" class="input-text" :value="getChild(1).date_of_birth" readonly></div></td>
        </tr>
        <tr>
            <th colspan="2">OCCUPATION</th>
            <td colspan="3"><div><input type="text" class="input-text" :value="spouse.occupation" readonly></div></td>
            <td colspan="2"><div><input type="text" class="input-text" :value="getChild(2).full_name" readonly></div></td>
            <td><div><input type="text" class="input-text" :value="getChild(2).date_of_birth" readonly></div></td>
        </tr>
        <tr>
            <th colspan="2">EMPLOYER/BUSINESS NAME</th>
            <td colspan="3"><div><input type="text" class="input-text" :value="spouse.employer" readonly></div></td>
            <td colspan="2"><div><input type="text" class="input-text" :value="getChild(3).full_name" readonly></div></td>
            <td><div><input type="text" class="input-text" :value="getChild(3).date_of_birth" readonly></div></td>
        </tr>
        <tr>
            <th colspan="2">BUSINESS ADDRESS</th>
            <td colspan="3"><div><input type="text" class="input-text" :value="spouse.business_address" readonly></div></td>
            <td colspan="2"><div><input type="text" class="input-text" :value="getChild(4).full_name" readonly></div></td>
            <td><div><input type="text" class="input-text" :value="getChild(4).date_of_birth" readonly></div></td>
        </tr>
        <tr>
            <th colspan="2">TELEPHONE NO.</th>
            <td colspan="3"><div><input type="text" class="input-text" :value="spouse.telephone_no" readonly></div></td>
            <td colspan="2"><div><input type="text" class="input-text" :value="getChild(5).full_name" readonly></div></td>
            <td><div><input type="text" class="input-text" :value="getChild(5).date_of_birth" readonly></div></td>
        </tr>
        <tr>
            <th colspan="2" style="border: none">24. FATHER'S SURNAME</th>
            <td colspan="3"><div><input type="text" class="input-text" :value="father.surname" readonly></div></td>
            <td colspan="2"><div><input type="text" class="input-text" :value="getChild(6).full_name" readonly></div></td>
            <td style="text-align: center;"><div><input type="text" class="input-text" :value="getChild(6).date_of_birth" readonly></div></td>
        </tr>
        <tr>
            <th colspan="2" style="border: none">FIRST NAME</th>
            <td colspan="1" style="width: 20%;"><div><input type="text" class="input-text" :value="father.first_name" readonly></div></td>
            <th colspan="2"><div style="font-size: 8px;">NAME EXTENSION (JR., SR)<input type="text" class="input-text" :value="father.name_extension" readonly style="background-color: transparent;"></div></th>
            <td colspan="2"><div><input type="text" class="input-text" :value="getChild(7).full_name" readonly></div></td>
            <td style="text-align: center;"><div><input type="text" class="input-text" :value="getChild(7).date_of_birth" readonly></div></td>
        </tr>
        <tr>
            <th colspan="2" style="border: none">MIDDLE NAME</th>
            <td colspan="3"><div><input type="text" class="input-text" :value="father.middle_name" readonly></div></td>
            <td colspan="2"><div><input type="text" class="input-text" :value="getChild(8).full_name" readonly></div></td>
            <td><div><input type="text" class="input-text" :value="getChild(8).date_of_birth" readonly></div></td>
        </tr>
        <tr>
            <th colspan="2" style="border-bottom: none">25. MOTHER'S MAIDEN NAME</th>
            <td colspan="3"><div><input type="text" class="input-text" :value="mother.surname" readonly></div></td>
            <td colspan="2"><div><input type="text" class="input-text" :value="getChild(9).full_name" readonly></div></td>
            <td style="text-align: center;"><div><input type="text" class="input-text" :value="getChild(9).date_of_birth" readonly></div></td>
        </tr>
        <tr>
            <th colspan="2" style="border: none">SURNAME</th>
            <td colspan="3"><input type="text" class="input-text" :value="mother.surname" readonly></td>
            <td colspan="2"><input type="text" class="input-text"></td>
            <td><input type="text" class="input-text"></td>
        </tr>
        <tr>
            <th colspan="2" style="border: none">FIRST NAME</th>
            <td colspan="3"><input type="text" class="input-text" :value="mother.first_name" readonly></td>
            <td colspan="2"><input type="text" class="input-text"></td>
            <td><input type="text" class="input-text"></td>
        </tr>
        <tr>
            <th colspan="2" style="border: none">MIDDLE NAME</th>
            <td colspan="3"><input type="text" class="input-text" :value="mother.middle_name" readonly></td>
            <td colspan="2"><input type="text" class="input-text"></td>
            <td><input type="text" class="input-text"></td>
        </tr>
        <tr>
            <td colspan="8" class="continuation" style="color: red;">(Continue on separate sheet if necessary)</td>
        </tr>
    </table>

    <div class="section-header">III. EDUCATIONAL BACKGROUND</div>
    <table>
        <tr>
            <th rowspan="2" style="width: 15%;">26. LEVEL</th>
            <th rowspan="2" style="width: 25%;">NAME OF SCHOOL<br>(Write in full)</th>
            <th rowspan="2" style="width: 25%;">BASIC EDUCATION/DEGREE/COURSE<br>(Write in full)</th>
            <th colspan="2" style="width: 15%;">PERIOD OF ATTENDANCE</th>
            <th rowspan="2" style="width: 10%;">HIGHEST LEVEL/<br>UNITS EARNED<br>(if not graduated)</th>
            <th rowspan="2" style="width: 10%;">YEAR<br>GRADUATED</th>
            <th rowspan="2" style="width: 10%;">SCHOLARSHIP/<br>ACADEMIC<br>HONORS<br>RECEIVED</th>
        </tr>
        <tr>
            <th style="width: 7%;">From</th>
            <th style="width: 7%;">To</th>
        </tr>
        <tr>
            <th>ELEMENTARY</th>
            <td><input type="text" class="input-text" :value="getEdu('Elementary').school_name" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Elementary').degree_course" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Elementary').from_year" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Elementary').to_year" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Elementary').highest_level" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Elementary').year_graduated" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Elementary').honors" readonly></td>
        </tr>
        <tr>
            <th>SECONDARY</th>
            <td><input type="text" class="input-text" :value="getEdu('Secondary').school_name" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Secondary').degree_course" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Secondary').from_year" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Secondary').to_year" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Secondary').highest_level" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Secondary').year_graduated" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Secondary').honors" readonly></td>
        </tr>
        <tr>
            <th>VOCATIONAL / TRADE COURSE</th>
            <td><input type="text" class="input-text" :value="getEdu('Vocational').school_name" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Vocational').degree_course" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Vocational').from_year" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Vocational').to_year" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Vocational').highest_level" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Vocational').year_graduated" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Vocational').honors" readonly></td>
        </tr>
        <tr>
            <th>COLLEGE</th>
            <td><input type="text" class="input-text" :value="getEdu('College').school_name" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('College').degree_course" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('College').from_year" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('College').to_year" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('College').highest_level" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('College').year_graduated" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('College').honors" readonly></td>
        </tr>
        <tr>
            <th>GRADUATE STUDIES</th>
            <td><input type="text" class="input-text" :value="getEdu('Graduate').school_name" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Graduate').degree_course" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Graduate').from_year" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Graduate').to_year" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Graduate').highest_level" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Graduate').year_graduated" readonly></td>
            <td><input type="text" class="input-text" :value="getEdu('Graduate').honors" readonly></td>
        </tr>
        <tr>
            <th colspan="8" style="text-align: center; color: red;">continue on seperate sheet if necessary</th>
        </tr>
        <tr>
            <th style="font-weight: bold;">SIGNATURE</th>
            <td colspan="2"><input type="text" class="input-text"></td>
            <th colspan="2" style="text-align: center; font-weight: bold;">DATE</th>
            <td colspan="3"><input type="text" class="input-text"></td>
        </tr>
        <tr>
            <th colspan="8" style="background-color: white; text-align: end; font-style: italic;">CS FORM 212 (Revised 2025), Page 1 of 4</th>
        </tr>
    </table>
</div>
