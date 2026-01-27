<div class="page">
    <table>
        <tr>
            <th colspan="2" style="width: 70%; border-bottom: none;">34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be apppointed,</th>
        </tr>
        <tr>
            <th colspan="2" style="border-top: none; border-bottom: none;">a. within the third degree?</th>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '34')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '34')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <th colspan="2" rowspan="2" style="border-top: none; border-bottom: none;">b. within the fourth degree (for Local Government Unit - Career Employees)?</th>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '34')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '34')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: none;">if YES, give details: <br><input type="text" class="input-text"></td>
        </tr>


        <tr>
            <th colspan="2" rowspan="2" style="border-bottom: none;">35. a. Have you ever been found guilty of any administrative offense?</th>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '35')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '35')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border: none;">if YES, give details: <br><input type="text" class="input-text" :value="declarations.find(d => d.question_no == '35')?.details" readonly></td>
        </tr>
        <tr>
            <th colspan="2" rowspan="2" style="border-top: none; border-bottom: none;">b. Have you been criminally charged before any court?</th>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '36')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '36')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: none;">if YES, give details: <br>Date Filed: <input type="text" class="input-text" style="width: fit-content;" :value="declarations.find(d => d.question_no == '36')?.details" readonly> <br>Status of Case/s: <input type="text" class="input-text" style="width: fit-content;"></td>
        </tr>

        <tr>
            <th colspan="2" rowspan="2" style="width: 70%; border-bottom: none;">36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</th>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '36')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '36')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: none;">if YES, give details: <br><input type="text" class="input-text" :value="declarations.find(d => d.question_no == '36')?.details" readonly></td>
        </tr>

        <tr>
            <th colspan="2" rowspan="2" style="width: 70%; border-bottom: none;">37. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</th>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '37')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '37')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: none;">if YES, give details: <br><input type="text" class="input-text" :value="declarations.find(d => d.question_no == '37')?.details" readonly></td>
        </tr>


        <tr>
            <th colspan="2" rowspan="2" style="width: 70%; border-bottom: none;">38. a. Have you ever been a candidate in a national or local election held within the last year (except Taranga election)?</th>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '38')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '38')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: none; border-bottom: none;">if YES, give details: <br><input type="text" class="input-text" :value="declarations.find(d => d.question_no == '38')?.details" readonly></td>
        </tr>
        <tr>
            <th colspan="2" rowspan="2" style="border-top: none; border-bottom: none;">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</th>
             <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '38')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '38')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: none;">if YES, give details: <br><input type="text" class="input-text"></td>
        </tr>


        <tr>
            <th colspan="2" rowspan="2" style="width: 70%; border-bottom: none;">39. Have you acquired the status of an immigrant or permanent resident of another country?</th>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '39')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '39')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: none;">if YES, give details (country): <br><input type="text" class="input-text" :value="declarations.find(d => d.question_no == '39')?.details" readonly></td>
        </tr>


        <tr>
            <th colspan="2" style="width: 70%; border-bottom: none;">40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</th>
        </tr>
        <tr>
            <th colspan="2" rowspan="2" style="border-top: none; border-bottom: none;">a. Are you a member of any indigenous group?</th>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '40')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '40')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: none; border-bottom: none;">if YES, give details: <br><input type="text" class="input-text" :value="declarations.find(d => d.question_no == '40')?.details" readonly></td>
        </tr>
        <tr>
            <th colspan="2" rowspan="2" style="border-top: none; border-bottom: none;">b. Are you a person with disability?</th>
             <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '40')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '40')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: none; border-bottom: none;">if YES, give details: <br><input type="text" class="input-text"></td>
        </tr>
        <tr>
            <th colspan="2" rowspan="2" style="border-top: none; border-bottom: none;">c. Are you a solo parent?</th>
             <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '40')?.answer === 'Yes'" onclick="return false;">YES</td>
            <td style="border: none;"><input type="checkbox" :checked="declarations.find(d => d.question_no == '40')?.answer === 'No'" onclick="return false;">NO</td>
        </tr>
        <tr>
            <td colspan="2" style="border-top: none;">if YES, give details: <br><input type="text" class="input-text"></td>
        </tr>
    </table>

    <table>
        <tr>
            <th colspan="3" style="width: 80%; border-bottom: none;">41. REFERENCES (Person not related by consanguinity or affinity to applicant /appointee)</th>
            <td style="border: none;"></td>
        </tr>
        <tr>
            <th>NAME</th>
            <th>OFFICE / RESIDENTIAL ADDRESS</th>
            <th>CONTACT NO. AND/OR EMAIL</th>
            <td rowspan="4" style="border: 1px solid black; width: 3.5cm; height: 4.5cm; padding: 0;">
                <div class="passport" style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                    <template x-if="photo">
                        <img :src="photo" style="width: 100%; height: 100%; object-fit: cover;">
                    </template>
                    <template x-if="!photo">
                        <div style="padding: 10px; text-align: center; font-size: 8px;">Passport-sized unfiltered digital picture taken within the last 6 months 4.5 cm. X 3.5 cm</div>
                    </template>
                </div>
            </td>
        </tr>
        <tr>
            <td><input type="text" class="input-text" :value="getRef(0).name" readonly></td>
            <td><input type="text" class="input-text" :value="getRef(0).address" readonly></td>
            <td><input type="text" class="input-text" :value="getRef(0).contact" readonly></td>
        </tr>
        <tr>
            <td><input type="text" class="input-text" :value="getRef(1).name" readonly></td>
            <td><input type="text" class="input-text" :value="getRef(1).address" readonly></td>
            <td><input type="text" class="input-text" :value="getRef(1).contact" readonly></td>
        </tr>
        <tr>
            <td><input type="text" class="input-text" :value="getRef(2).name" readonly></td>
            <td><input type="text" class="input-text" :value="getRef(2).address" readonly></td>
            <td><input type="text" class="input-text" :value="getRef(2).contact" readonly></td>
        </tr>
        <tr>
            <th colspan="3" style="width: 80%; border-bottom: none;">42. I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein. I agree that any misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal case/s against me.</th>
            <td style="border: none; text-align: center; font-weight:100;">PHOTO</td>
        </tr>
        <tr>
            <td style="border-right: none;">
                <table style="width: 100%; height: 150px;">
                    <th colspan="2">Government Issued ID (i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.) <br> PLEASE INDICATE ID Number and Date of Issuance</th>
                    <tr>
                        <td>Government Issued ID: </td>
                        <td><input type="text" class="input-text" :value="government_id.id_type" readonly></td>
                    </tr>
                    <tr>
                        <td>ID/License/Passport No.: </td>
                        <td><input type="text" class="input-text" :value="government_id.id_number" readonly></td>
                    </tr>
                    <tr>
                        <td>Date/Place of Issuance: </td>
                        <td><input type="text" class="input-text" :value="government_id.place_issued" readonly></td>
                    </tr>
                </table>
            </td>

            <td colspan="2" style="border-left: none; border-right: none;">
                <table style="width: 100%;">
                    <tr><td style="height: 80px;"></td></tr>
                    <tr><th style="text-align: center;">Signature (Sign inside the box)</th></tr>
                    <tr><td> <input type="text" class="input-text"></td></tr>
                    <tr><th style="text-align: center;">Date Accomplished</th></tr>
                </table>
            </td>

            <td colspan="2" style="border-left: none; border-top: none;">
                <table style="width: 100%;">
                    <tr><td style="height: 125px;"></td></tr>
                    <tr><th style="text-align: center;">Right Thumbmark</th></tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center; border: none;">SUBSCRIBED AND SWORN to before me this _______________________________ , affiant exhibiting his/her validly issued government ID as indicated above.</td>
        </tr>
        <tr>
            <td colspan="4" style="border: none;">
                <table style="width: 30%; margin: auto;">
                    <tr><td style="height: 125px;"></td></tr>
                    <tr><th style="text-align: center;">Person Administering Oath</th></tr>
                </table>
            </td>
        </tr>
        <th colspan="8" style="background-color: white; text-align: end; font-style: italic;">CS FORM 212 (Revised 2025), Page 4 of 4</th>
    </table>
</div>
