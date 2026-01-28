<template x-teleport="body">
    <div x-show="showPreview" style="display: none;"
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-6xl h-full flex flex-col">
            <div class="flex justify-between items-center p-4 border-b">
                <h3 class="text-xl font-bold">PDS Preview</h3>
                <button type="button" @click="showPreview = false"
                    class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
            </div>
            <div class="flex-1 overflow-auto p-8 bg-gray-100">
                <div class="bg-white p-8 shadow-sm mx-auto" style="width: 8.5in; min-height: 13in;">
                    <style>
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
                            height: 100%;
                            background: transparent;
                            border: none;
                            font-weight: bold;
                            font-size: 8pt;
                            font-family: "Courier New", monospace;
                            color: #000;
                            text-align: left;
                            padding-left: 5px;
                            resize: none;
                            white-space: normal;
                            display: block;
                            overflow: hidden;
                            vertical-align: middle;
                        }

                        #pds-preview-content .centered-data .input-text {
                            text-align: center;
                            padding-left: 0;
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
                    </style>

                    <div id="pds-preview-content">
                        <x-pds-page-one />
                        <x-pds-page-two />
                        <x-pds-page-three />
                        <x-pds-page-four />
                    </div>
                </div>
            </div>
            <div class="p-4 border-t bg-gray-50 flex justify-end">
                <button type="button" @click="showPreview = false"
                    class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Close</button>
            </div>
        </div>
    </div>
</template>