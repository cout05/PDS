<div class="page">
    <div class="section-header">IV. CIVIL SERVICE ELIGIBILITY</div>
    <table class="centered-data">
        <tr>
            <th rowspan="2" style="width: 20%;">27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE
                BARANGAY ELIGIBILITY / DRIVER'S LICENSE</th>
            <th rowspan="2" style="width: 5%;">RATING (If Applicable)</th>
            <th rowspan="2" style="width: 5%;">DATE OF EXAMINATION / CONFERMENT</th>
            <th rowspan="2" style="width: 10%;">PLACE OF EXAMINATION / CONFERMENT</th>
            <th colspan="2" style="width: 10%;">LICENSE (if applicable)</th>
        </tr>
        <tr>
            <th style="width: 7%;">From</th>
            <th style="width: 7%;">To</th>
        </tr>
        @for ($i = 0; $i < 7; $i++)
<<<<<<< HEAD
        <tr>
            <td><input type="text" class="input-text" :value="getCS({{ $i }}).eligibility_type" readonly></td>
            <td><input type="text" class="input-text" :value="getCS({{ $i }}).rating" readonly></td>
            <td><input type="text" class="input-text" :value="formatDate(getCS({{ $i }}).exam_date)" readonly></td>
            <td><input type="text" class="input-text" :value="getCS({{ $i }}).exam_place" readonly></td>
            <td><input type="text" class="input-text" :value="getCS({{ $i }}).license_no" readonly></td>
            <td><input type="text" class="input-text" :value="formatDate(getCS({{ $i }}).valid_to)" readonly></td>
        </tr>
=======
            <tr>
                <td><textarea class="input-text" :value="getCS({{ $i }}).eligibility_type" readonly></textarea></td>
                <td><input type="text" class="input-text" :value="getCS({{ $i }}).rating" readonly></td>
                <td><input type="text" class="input-text" :value="formatDate(getCS({{ $i }}).exam_date)" readonly></td>
                <td><textarea class="input-text" :value="getCS({{ $i }}).exam_place" readonly></textarea></td>
                <td><input type="text" class="input-text" :value="getCS({{ $i }}).license_no" readonly></td>
                <td><input type="text" class="input-text" :value="formatDate(getCS({{ $i }}).valid_to)" readonly></td>
            </tr>
>>>>>>> 2a0bc891da27e4715348feff54930e414d652d77
        @endfor
        <th colspan="8" style="text-align: center; color: red;">continue on seperate sheet if necessary</th>
    </table>

    <div class="section-header">V. WORK EXPERIENCE <br>(Include private employment. Start from your recent work)
        Description of duties should be indicated in the attached Work Experience sheet.</div>
    <table class="centered-data">
        <tr>
            <th colspan="2" style="width: 18%;">INCLUSIVE DATES (mm/dd/yyyy)</th>
            <th rowspan="2" style="width: 15%;">POSITION TITLE (Write in full/Do not abbreviate)</th>
            <th rowspan="2" style="width: 20%;">DEPARTMENT / AGENCY / OFFICE / COMPANY (Write in full/Do not abbreviate)
            </th>
            <th rowspan="2" style="width: 20%;">STATUS OF APPOINTMENT</th>
            <th rowspan="2" style="width: 5%;">GOV'T SERVICE (Y/ N)</th>
        </tr>
        <tr>
            <th style="width: 9%;">From</th>
            <th style="width: 9%;">To</th>
        </tr>
        @for ($i = 0; $i < 28; $i++)
<<<<<<< HEAD
        <tr>
            <td><input type="text" class="input-text" :value="formatDate(getWork({{ $i }}).date_from)" readonly></td>
            <td><input type="text" class="input-text" :value="formatDate(getWork({{ $i }}).date_to)" readonly></td>
            <td><input type="text" class="input-text" :value="getWork({{ $i }}).position_title" readonly></td>
            <td><input type="text" class="input-text" :value="getWork({{ $i }}).agency" readonly></td>
            <td><input type="text" class="input-text" :value="getWork({{ $i }}).appointment_status" readonly></td>
            <td><input type="text" class="input-text" :value="getWork({{ $i }}).gov_service" readonly></td>
        </tr>
=======
            <tr>
                <td><input type="text" class="input-text" :value="formatDate(getWork({{ $i }}).date_from)" readonly></td>
                <td><input type="text" class="input-text" :value="formatDate(getWork({{ $i }}).date_to)" readonly></td>
                <td><textarea class="input-text" :value="getWork({{ $i }}).position_title" readonly></textarea></td>
                <td><textarea class="input-text" :value="getWork({{ $i }}).agency" readonly></textarea></td>
                <td><input type="text" class="input-text" :value="getWork({{ $i }}).appointment_status" readonly></td>
                <td><input type="text" class="input-text" :value="getWork({{ $i }}).gov_service" readonly></td>
            </tr>
>>>>>>> 2a0bc891da27e4715348feff54930e414d652d77
        @endfor
    </table>
    <table>
        <tr>
            <th colspan="8" style="text-align: center; color: red;">continue on seperate sheet if necessary</th>
        </tr>
        <tr>
            <th style="font-weight: bold;">SIGNATURE</th>
            <td colspan="2"><input type="text" class="input-text"></td>
            <th colspan="2" style="text-align: center; font-weight: bold;">DATE</th>
            <td colspan="3"><input type="text" class="input-text" :value="formatDate(government_id.date_accomplished)"
                    readonly></td>
        </tr>
        <tr>
            <th colspan="8" style="background-color: white; text-align: end; font-style: italic;">CS FORM 212 (Revised
                2025), Page 2 of 4</th>
        </tr>
    </table>
</div>