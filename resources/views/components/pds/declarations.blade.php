<div x-show="step === 12" class="space-y-6">
    <h2 class="text-xl font-semibold border-b pb-2">XII. Declarations</h2>
    <div class="space-y-4">
        <!-- Question 34 -->
        <div class="border p-4 rounded">
            <p class="text-sm font-medium mb-2">34. Are you related by consanguinity or affinity to the appointing or recommending authority, or to the chief of bureau or office or to the person who has immediate supervision over you in the Office, Bureau or Department where you will be apppointed,</p>
            <div class="ml-4 space-y-4">
                 <div>
                    <p class="text-xs text-gray-600 mb-1">a. within the third degree?</p>
                    <input type="hidden" name="declarations[0][question_no]" value="34a">
                    <label class="mr-4"><input type="radio" name="declarations[0][answer]" x-model="declarations[0].answer" value="Yes"> Yes</label>
                    <label><input type="radio" name="declarations[0][answer]" x-model="declarations[0].answer" value="No"> No </label>
                 </div>
                 <div>
                    <p class="text-xs text-gray-600 mb-1">b. within the fourth degree (for Local Government Unit - Career Employees)?</p>
                    <input type="hidden" name="declarations[1][question_no]" value="34b">
                    <label class="mr-4"><input type="radio" name="declarations[1][answer]" x-model="declarations[1].answer" value="Yes"> Yes</label>
                    <label><input type="radio" name="declarations[1][answer]" x-model="declarations[1].answer" value="No"> No </label>
                    <input type="text" name="declarations[1][details]" x-model="declarations[1].details" placeholder="If YES, give details" class="mt-2 block w-full rounded border-gray-300 text-sm">
                 </div>
            </div>
        </div>

         <!-- Question 35 -->
        <div class="border p-4 rounded">
            <p class="text-sm font-medium mb-2">35. a. Have you ever been found guilty of any administrative offense?</p>
            <div class="ml-4 space-y-2">
                 <input type="hidden" name="declarations[2][question_no]" value="35a">
                 <label class="mr-4"><input type="radio" name="declarations[2][answer]" x-model="declarations[2].answer" value="Yes"> Yes</label>
                 <label><input type="radio" name="declarations[2][answer]" x-model="declarations[2].answer" value="No"> No</label>
                 <input type="text" name="declarations[2][details]" x-model="declarations[2].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
            </div>
            <p class="text-sm font-medium mt-4 mb-2">b. Have you been criminally charged before any court?</p>
            <div class="ml-4 space-y-2">
                 <input type="hidden" name="declarations[3][question_no]" value="35b">
                 <label class="mr-4"><input type="radio" name="declarations[3][answer]" x-model="declarations[3].answer" value="Yes"> Yes</label>
                 <label><input type="radio" name="declarations[3][answer]" x-model="declarations[3].answer" value="No"> No</label>
                 <div class="grid grid-cols-2 gap-2 mt-1">
                     <input type="text" name="declarations[3][details]" x-model="declarations[3].details" placeholder="If YES, Date Filed" class="block w-full rounded border-gray-300 text-sm">
                     <input type="text" name="declarations[3][status]" placeholder="Status of Case/s" class="block w-full rounded border-gray-300 text-sm">
                 </div>
            </div>
        </div>

        <!-- Question 36 -->
        <div class="border p-4 rounded">
            <p class="text-sm font-medium mb-2">36. Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?</p>
            <div class="ml-4 space-y-2">
                 <input type="hidden" name="declarations[4][question_no]" value="36">
                 <label class="mr-4"><input type="radio" name="declarations[4][answer]" x-model="declarations[4].answer" value="Yes"> Yes</label>
                 <label><input type="radio" name="declarations[4][answer]" x-model="declarations[4].answer" value="No"> No</label>
                 <input type="text" name="declarations[4][details]" x-model="declarations[4].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
            </div>
        </div>

        <!-- Question 37 -->
        <div class="border p-4 rounded">
            <p class="text-sm font-medium mb-2">37. Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased out (abolition) in the public or private sector?</p>
            <div class="ml-4 space-y-2">
                 <input type="hidden" name="declarations[5][question_no]" value="37">
                 <label class="mr-4"><input type="radio" name="declarations[5][answer]" x-model="declarations[5].answer" value="Yes"> Yes</label>
                 <label><input type="radio" name="declarations[5][answer]" x-model="declarations[5].answer" value="No"> No</label>
                 <input type="text" name="declarations[5][details]" x-model="declarations[5].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
            </div>
        </div>

        <!-- Question 38 -->
        <div class="border p-4 rounded">
            <p class="text-sm font-medium mb-2">38. a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?</p>
            <div class="ml-4 space-y-2">
                 <input type="hidden" name="declarations[6][question_no]" value="38a">
                 <label class="mr-4"><input type="radio" name="declarations[6][answer]" x-model="declarations[6].answer" value="Yes"> Yes</label>
                 <label><input type="radio" name="declarations[6][answer]" x-model="declarations[6].answer" value="No"> No</label>
                 <input type="text" name="declarations[6][details]" x-model="declarations[6].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
            </div>
            <p class="text-sm font-medium mt-4 mb-2">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?</p>
            <div class="ml-4 space-y-2">
                 <input type="hidden" name="declarations[7][question_no]" value="38b">
                 <label class="mr-4"><input type="radio" name="declarations[7][answer]" x-model="declarations[7].answer" value="Yes"> Yes</label>
                 <label><input type="radio" name="declarations[7][answer]" x-model="declarations[7].answer" value="No"> No</label>
                 <input type="text" name="declarations[7][details]" x-model="declarations[7].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
            </div>
        </div>

        <!-- Question 39 -->
        <div class="border p-4 rounded">
            <p class="text-sm font-medium mb-2">39. Have you acquired the status of an immigrant or permanent resident of another country?</p>
            <div class="ml-4 space-y-2">
                 <input type="hidden" name="declarations[8][question_no]" value="39">
                 <label class="mr-4"><input type="radio" name="declarations[8][answer]" x-model="declarations[8].answer" value="Yes"> Yes</label>
                 <label><input type="radio" name="declarations[8][answer]" x-model="declarations[8].answer" value="No"> No </label>
                 <input type="text" name="declarations[8][details]" x-model="declarations[8].details" placeholder="If YES, give details (country)" class="mt-1 block w-full rounded border-gray-300 text-sm">
            </div>
        </div>

        <!-- Question 40 -->
        <div class="border p-4 rounded">
            <p class="text-sm font-medium mb-2">40. Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</p>
            <div class="ml-4 space-y-4">
                 <div>
                    <p class="text-xs text-gray-600 mb-1">a. Are you a member of any indigenous group?</p>
                    <input type="hidden" name="declarations[9][question_no]" value="40a">
                    <label class="mr-4"><input type="radio" name="declarations[9][answer]" x-model="declarations[9].answer" value="Yes"> Yes</label>
                    <label><input type="radio" name="declarations[9][answer]" x-model="declarations[9].answer" value="No"> No </label>
                    <input type="text" name="declarations[9][details]" x-model="declarations[9].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                 </div>
                 <div>
                    <p class="text-xs text-gray-600 mb-1">b. Are you a person with disability?</p>
                    <input type="hidden" name="declarations[10][question_no]" value="40b">
                    <label class="mr-4"><input type="radio" name="declarations[10][answer]" x-model="declarations[10].answer" value="Yes"> Yes</label>
                    <label><input type="radio" name="declarations[10][answer]" x-model="declarations[10].answer" value="No"> No </label>
                    <input type="text" name="declarations[10][details]" x-model="declarations[10].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                 </div>
                 <div>
                    <p class="text-xs text-gray-600 mb-1">c. Are you a solo parent?</p>
                    <input type="hidden" name="declarations[11][question_no]" value="40c">
                    <label class="mr-4"><input type="radio" name="declarations[11][answer]" x-model="declarations[11].answer" value="Yes"> Yes</label>
                    <label><input type="radio" name="declarations[11][answer]" x-model="declarations[11].answer" value="No"> No </label>
                    <input type="text" name="declarations[11][details]" x-model="declarations[11].details" placeholder="If YES, give details" class="mt-1 block w-full rounded border-gray-300 text-sm">
                 </div>
            </div>
        </div>
    </div>
</div>
