<style>
    .btn {
        display: inline-block;
        text-align: center;
        vertical-align: middle;
        user-select: none;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.375rem 0.75rem;
        font-size: .875rem;
        line-height: 1.5;
        border-radius: 0.25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    .btn-primary {
        background-color: #fb9678;
        border-color: #fb9678;
        color: white;
    }
</style>

<div>
    <button class="btn btn-primary" onclick="printAll()">Print</button>
</div>

<div id="A4" style=" width: 297mm;
        min-height: 210mm;
        margin: 0 auto;
        background: white;
        border: 1px solid green;">
    <table border="1" style="width: 100%">
        <tbody>
        <tr>
            <td>
                <div style="border: 1px solid gray; padding: 5px 10px;">
                    <div style="display: flex; justify-content: space-around">
                        <p style="text-align: center">Bank Al-Habib <br> Shahrah-e-Faisal Branch <br> Karachi</p>
                        <p style="text-align: center">Due Date <br> 21-02-2200 <br> Copy</p>
                    </div>
                    <p style="font-weight: bold">A/c. 1003-0072-54478-75-1</p>
                    <p>Challan No: <span style="border: 1px solid gray; padding: 5px 10px; background-color: lightgray">3624</span></p>
                    <p>GR. No: <span>2214</span></p>
                    <p>Issue Date: <span>2214</span></p>
                </div>
                <div STYLE="text-align: center">
                    <p style="font-weight: bold">Custom Public School <br> Gulshan-e-Iqbal, Block-11</p>
                </div>
                <div style="text-align: left">
                    <p>Student's Name: abv</p>
                    <p>Class: abv</p>
                </div>
            </td>
            <td>
                <div style="border: 1px solid gray; padding: 5px 10px;">
                    <div style="display: flex; justify-content: space-around">
                        <p style="text-align: center">Bank Al-Habib <br> Shahrah-e-Faisal Branch <br> Karachi</p>
                        <p style="text-align: center">Due Date <br> 21-02-2200 <br> Copy</p>
                    </div>
                    <p style="font-weight: bold">A/c. 1003-0072-54478-75-1</p>
                    <p>Challan No: <span style="border: 1px solid gray; padding: 5px 10px; background-color: lightgray">3624</span></p>
                    <p>GR. No: <span>2214</span></p>
                    <p>Issue Date: <span>2214</span></p>
                </div>
                <div STYLE="text-align: center">
                    <p style="font-weight: bold">Custom Public School <br> Gulshan-e-Iqbal, Block-11</p>
                </div>
                <div style="text-align: left">
                    <p>Student's Name: abv</p>
                    <p>Class: abv</p>
                </div>
            </td>
            <td>
                <div style="border: 1px solid gray; padding: 5px 10px;">
                    <div style="display: flex; justify-content: space-around">
                        <p style="text-align: center">Bank Al-Habib <br> Shahrah-e-Faisal Branch <br> Karachi</p>
                        <p style="text-align: center">Due Date <br> 21-02-2200 <br> Copy</p>
                    </div>
                    <p style="font-weight: bold">A/c. 1003-0072-54478-75-1</p>
                    <p>Challan No: <span style="border: 1px solid gray; padding: 5px 10px; background-color: lightgray">3624</span></p>
                    <p>GR. No: <span>2214</span></p>
                    <p>Issue Date: <span>2214</span></p>
                </div>
                <div STYLE="text-align: center">
                    <p style="font-weight: bold">Custom Public School <br> Gulshan-e-Iqbal, Block-11</p>
                </div>
                <div style="text-align: left">
                    <p>Student's Name: abv</p>
                    <p>Class: abv</p>
                </div>
            </td>
        </tr>
        </tbody>
    </table>
</div>

<script>
    function printAll() {
        var data = {!! $data !!}
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById('A4').innerHTML;
        document.body.innerHTML = printcontent;
        window.print();
        document.body.innerHTML = restorepage;
    }
</script>
