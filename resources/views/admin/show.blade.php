@extends('layouts.admin')

@section('content')
    <div class="mb-4 flex justify-between items-center no-print">
        <a href="{{ route('admin.index') }}" class="text-blue-600 hover:underline">&larr; Back to List</a>
        <button onclick="window.print()" class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700">Print
            PDS</button>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('pdsData', () => ({
                surname: {{ Js::from($submission->surname) }},
                first_name: {{ Js::from($submission->first_name) }},
                middle_name: {{ Js::from($submission->middle_name) }},
                name_extension: {{ Js::from($submission->name_extension) }},
                date_of_birth: {{ Js::from($submission->date_of_birth) }},
                place_of_birth: {{ Js::from($submission->place_of_birth) }},
                sex: {{ Js::from($submission->sex) }},
                civil_status: {{ Js::from($submission->civil_status) }},
                citizenship: {{ Js::from($submission->citizenship) }},
                height_m: {{ Js::from($submission->height_m) }},
                weight_kg: {{ Js::from($submission->weight_kg) }},
                blood_type: {{ Js::from($submission->blood_type) }},
                umid_no: {{ Js::from($submission->umid_no) }},
                pagibig_no: {{ Js::from($submission->pagibig_no) }},
                philhealth_no: {{ Js::from($submission->philhealth_no) }},
                psn: {{ Js::from($submission->psn) }},
                tin_no: {{ Js::from($submission->tin_no) }},
                agency_employee_no: {{ Js::from($submission->agency_employee_no) }},
                telephone_no: {{ Js::from($submission->telephone_no) }},
                mobile_no: {{ Js::from($submission->mobile_no) }},
                email: {{ Js::from($submission->email) }},
                photo: {{ Js::from($submission->photo) }},
                residential_address: {{ Js::from($submission->addresses->where('type', 'Residential')->first() ?? (object) []) }},
                permanent_address: {{ Js::from($submission->addresses->where('type', 'Permanent')->first() ?? (object) []) }},
                spouse: {{ Js::from($submission->spouse ?? (object) []) }},
                father: {{ Js::from($submission->parents->where('type', 'Father')->first() ?? (object) []) }},
                mother: {{ Js::from($submission->parents->where('type', 'Mother')->first() ?? (object) []) }},
                children: {{ Js::from($submission->children) }},
                education: {{ Js::from($submission->education) }},
                civilService: {{ Js::from($submission->civilServiceEligibilities) }},
                workExperience: {{ Js::from($submission->workExperiences) }},
                voluntaryWork: {{ Js::from($submission->voluntaryWorks) }},
                learning: {{ Js::from($submission->learningDevelopments) }},
                other_info: {{ Js::from($submission->otherInformation ?? (object) []) }},
                declarations: {{ Js::from($submission->declarations) }},
                references: {{ Js::from($submission->references) }},
                government_id: {{ Js::from($submission->identification ?? (object) []) }},

                getEdu(level) { return this.education.find(e => e.level === level) || {} },
                getChild(index) { return this.children[index] || {} },
                getCS(index) { return this.civilService[index] || {} },
                getWork(index) { return this.workExperience[index] || {} },
                getVol(index) { return this.voluntaryWork[index] || {} },
                getLearn(index) { return this.learning[index] || {} },
                getRef(index) { return this.references[index] || {} },
                formatDate(date) { return date ? new Date(date).toLocaleDateString() : "" },
                formatDateRange(from, to) { return (from || "") + (to ? " to " + to : "") }
            }));
        });
    </script>

    <div class="bg-gray-100 p-8 flex justify-center" x-data="pdsData()">
        <div class="bg-white p-8 shadow-sm mx-auto" style="width: 8.5in; min-height: 13in;">
            <style>
                /* Scoped Styles for PDS Preview (Copied from welcome.blade.php) */
                #pds-preview-content {
                    font-family: Arial, sans-serif;
                    font-size: 10pt;
                    color: black;
                }

                #pds-preview-content .page {
                    page-break-after: always;
                    margin-bottom: 20px;
                    border-bottom: 2px dashed #ccc;
                    padding-bottom: 20px;
                }

                #pds-preview-content table {
                    width: 100%;
                    border-collapse: collapse;
                    border: 1px solid black;
                    font-size: 8pt;
                    margin-top: 5px;
                }

                #pds-preview-content th,
                #pds-preview-content td {
                    border: 1px solid black;
                    padding: 2px;
                    vertical-align: top;
                }

                #pds-preview-content th {
                    background-color: #f0f0f0;
                    text-align: left;
                    font-weight: normal;
                    font-style: italic;
                    font-size: 8pt;
                }

                #pds-preview-content .section-header {
                    background-color: #999;
                    color: white;
                    padding: 2px 5px;
                    font-weight: bold;
                    font-style: italic;
                    border: 1px solid black;
                    margin-top: 10px;
                    font-size: 9pt;
                }

                #pds-preview-content .input-text {
                    width: 100%;
                    background: transparent;
                    border: none;
                    font-weight: bold;
                    font-size: 9pt;
                    font-family: 'Courier New', monospace;
                    color: #000;
                    text-align: center;
                }

                #pds-preview-content .checkbox-container {
                    font-size: 10px;
                    display: flex;
                    align-items: center;
                    gap: 4px;
                }

                #pds-preview-content .header {
                    text-align: center;
                    margin-bottom: 10px;
                }

                #pds-preview-content .form-number {
                    text-align: left;
                    float: left;
                    font-size: 9pt;
                    font-weight: bold;
                    margin-top: 5px;
                }

                #pds-preview-content .title {
                    font-size: 18pt;
                    font-weight: bold;
                    margin: 10px 0;
                }

                #pds-preview-content .warning {
                    font-style: italic;
                    font-size: 8pt;
                    font-weight: bold;
                    margin: 10px 0;
                    text-align: justify;
                }

                #pds-preview-content .instructions {
                    font-size: 8pt;
                    font-weight: bold;
                    margin: 5px 0;
                    text-align: justify;
                }

                #pds-preview-content .passport {
                    font-size: 8px;
                    border: 1px solid black;
                    font-weight: normal;
                    width: 3.5cm;
                    height: 4.5cm;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    text-align: center;
                    margin: auto;
                }

                #pds-preview-content .thumbmark {
                    width: 163px;
                    height: 150px;
                    border: 1px solid black;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: auto;
                    font-size: 8px;
                }

                #pds-preview-content .address {
                    width: 100%;
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                }

                #pds-preview-content .small {
                    font-size: 8px;
                }

                @media print {
                    #pds-preview-content .page {
                        border-bottom: none;
                    }

                    body {
                        background-color: white !important;
                    }

                    .bg-gray-100 {
                        background-color: white !important;
                    }
                }
            </style>

            <div id="pds-preview-content">
                <x-pds-page-one />
                <x-pds-page-two />
                <x-pds-page-three />
                <x-pds-page-four />
            </div>
        </div>
    </div>
@endsection