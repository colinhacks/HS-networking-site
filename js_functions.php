

<script type="text/javascript">
function add_job1(){
document.getElementById('job1').style.visibility = 'visible';
document.getElementById('job1').innerHTML =
'Position: <br/><input id=\"job_position_past_1\" name=\"job_position_past_1\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"   /><br/>Company/employer: <br/><input id=\"job_company_past_1\" name=\"job_company_past_1\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"  /> <br/><a  class=\"fake_button\"  id=\"add_job2\" style=\"visibility:visible\"  href=\"#anchor2\" onclick=\"add_job2()\">Add a job</a>';
document.getElementById('add_job1').style.visibility = 'hidden';
document.getElementById('add_job1').innerHTML = '';
//document.getElementById('fs1').innerHTML = '</fieldset>';
}

function add_job2(){
document.getElementById('job2').style.visibility = 'visible';

document.getElementById('job2').innerHTML =
'Position: <br/><input id=\"job_position_past_2\" name=\"job_position_past_2\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"   /><br/>Company/employer: <br/><input id=\"job_company_past_2\" name=\"job_company_past_2\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"  /><br/><a id=\"add_job3\"  class=\"fake_button\"  style=\"visibility:visible\"  href=\"#anchor3\" onclick=\"add_job3()\">Add a job</a>';
document.getElementById('add_job2').innerHTML = '';
document.getElementById('add_job2').style.visibility = 'hidden';
//document.getElementById('fs1').innerHTML = '';
//document.getElementById('fs2').innerHTML = '</fieldset>';
}

function add_job3(){
document.getElementById('job3').style.visibility = 'visible';

document.getElementById('job3').innerHTML =
'Position: <br/><input id=\"job_position_past_3\" name=\"job_position_past_3\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"   /><br/>Company/employer: <br/><input id=\"job_company_past_3\" name=\"job_company_past_3\" style=\"border:2px #12146B solid;background-color:LightGrey\" size=\"28\" maxlength=\"50\" type=\"text\"  />';
document.getElementById('add_job3').innerHTML = '';
document.getElementById('add_job3').style.visibility = 'hidden';
//document.getElementById('fs2').innerHTML = '';
//document.getElementById('fs3').innerHTML = '</fieldset>';
}

function edit_current(){
document.getElementById('edit_current').style.visibility = 'visible';
document.getElementById('edit_current').innerHTML =
"New recent picture:<br><input style='border:2px #12146B solid;' type='file' id='current_picture' name='current_picture' size='28' maxlength='100' /><br />";
document.getElementById('edit_current_button').style.visibility = 'hidden';
document.getElementById('edit_current_button').innerHTML = '';
//document.getElementById('fs1').innerHTML = '</fieldset>';
}

function edit_hs(){
document.getElementById('edit_hs').style.visibility = 'visible';
document.getElementById('edit_hs').innerHTML =
"New high school picture:<br><input style='border:2px #12146B solid;' type='file' id='current_picture' name='current_picture' size='28' maxlength='100' /><br />";
document.getElementById('edit_hs_button').style.visibility = 'hidden';
document.getElementById('edit_hs_button').innerHTML = '';
//document.getElementById('fs1').innerHTML = '</fieldset>';
}
</script>
