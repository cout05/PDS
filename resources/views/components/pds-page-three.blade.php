<div class="page">
    <div class="section-header">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</div>
    <table>
        <tr>
            <th rowspan="2" style="width: 20%;">29. NAME & ADDRESS OF ORGANIZATION (Write in full)</th>
            <th colspan="2" style="width: 10%;">INCLUSIVE DATES (mm/dd/yyyy)</th>
            <th rowspan="2" style="width: 10%;">NUMBER OF HOURS</th>
            <th rowspan="2" style="width: 10%;">POSITION / NATURE OF WORK</th>
        </tr>
        <tr>
            <th style="width: 7%;">From</th>
            <th style="width: 7%;">To</th>
        </tr>
        @for ($i = 0; $i < 7; $i++)
        <tr>
            <td><input type="text" class="input-text" :value="getVol({{ $i }}).organization" readonly></td>
            <td><input type="text" class="input-text" :value="formatDate(getVol({{ $i }}).date_from)" readonly></td>
            <td><input type="text" class="input-text" :value="formatDate(getVol({{ $i }}).date_to)" readonly></td>
            <td><input type="text" class="input-text" :value="getVol({{ $i }}).hours" readonly></td>
            <td><input type="text" class="input-text" :value="getVol({{ $i }}).position" readonly></td>
        </tr>
        @endfor
        <th colspan="8" style="text-align: center; color: red;">continue on seperate sheet if necessary</th>
    </table>

    <div class="section-header">VII. LEARNING AND DEVELOPMENT (L&D) INTERVENTIONS/TRAINING PROGRAMS ATTENDED</div>
    <table>
        <tr>
            <th rowspan="2" style="width: 20%;">30. TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS (Write in full)</th>
            <th colspan="2" style="width: 10%;">INCLUSIVE DATES OF ATTENDANCE(mm/dd/yyyy)</th>
            <th rowspan="2" style="width: 10%;">NUMBER OF HOURS</th>
            <th rowspan="2" style="width: 10%;">Type of LD ( Managerial/ Supervisory/ Technical/etc) </th>
            <th rowspan="2" style="width: 10%;"> CONDUCTED/ SPONSORED BY (Write in full)</th>
        </tr>
        <tr>
            <th style="width: 7%;">From</th>
            <th style="width: 7%;">To</th>
        </tr>
        @for ($i = 0; $i < 20; $i++)
        <tr>
            <td><input type="text" class="input-text" :value="getLearn({{ $i }}).title" readonly></td>
            <td><input type="text" class="input-text" :value="formatDate(getLearn({{ $i }}).date_from)" readonly></td>
            <td><input type="text" class="input-text" :value="formatDate(getLearn({{ $i }}).date_to)" readonly></td>
            <td><input type="text" class="input-text" :value="getLearn({{ $i }}).hours" readonly></td>
            <td><input type="text" class="input-text" :value="getLearn({{ $i }}).type" readonly></td>
            <td><input type="text" class="input-text" :value="getLearn({{ $i }}).conducted_by" readonly></td>
        </tr>
        @endfor
        <th colspan="8" style="text-align: center; color: red;">continue on seperate sheet if necessary</th>
    </table>

    <div class="section-header">VIII. OTHER INFORMATION</div>
    <table>
        <tr>
            <th>31. SPECIAL SKILLS and HOBBIES</th>
            <th>32. NON-ACADEMIC DISTINCTIONS / RECOGNITION (Write in full)</th>
            <th>33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION (Write in full)</th>
        </tr>
        @for ($i = 0; $i < 7; $i++)
        <tr>
            <td><input type="text" class="input-text" :value="(other_info.skills || '').split('\n')[{{ $i }}]" readonly></td>
            <td><input type="text" class="input-text" :value="(other_info.recognitions || '').split('\n')[{{ $i }}]" readonly></td>
            <td><input type="text" class="input-text" :value="(other_info.memberships || '').split('\n')[{{ $i }}]" readonly></td>
        </tr>
        @endfor
        <th colspan="8" style="text-align: center; color: red;">continue on seperate sheet if necessary</th>
    </table>
    <table>
        <tr>
            <th style="font-weight: bold;">SIGNATURE</th>
            <td colspan="2"><input type="text" class="input-text"></td>
            <th colspan="2" style="text-align: center; font-weight: bold;">DATE</th>
            <td colspan="3"><input type="text" class="input-text"></td>
        </tr>
        <tr>
            <th colspan="8" style="background-color: white; text-align: end; font-style: italic;">CS FORM 212 (Revised 2025), Page 3 of 4</th>
        </tr>
    </table>
</div>
