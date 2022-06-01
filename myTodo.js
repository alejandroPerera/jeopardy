var task_name = document.getElementById("taskdesc");
var task_name_error = document.getElementById("taskdesc-note");
var due_date = document.getElementById("duedate");
var due_date_error = document.getElementById("duedate-note");
var priority = document.getElementById("priority");
function check_task_name() {
    if (task_name.value == ""){
        task_name_error.innerHTML = "task name cannot be empty";
        return false;
    }
    else{
        task_name_error.innerHTML = ""
    }
    return true;
}
function check_due_date() {
    console.log(new Date(due_date.value));
    console.log(due_date.value)
    if (due_date.value === "" || isNaN(new Date(due_date.value)).valueOf() === false){
        due_date_error.innerHTML = "Enter date in correct format";
        return false;
    }
    else{
        due_date_error.innerHTML = "";
        return false;
    }
    return true;
}

  
var rownumber = 1;
  
function addRow()
{
   var desc = task_name.value;           // dummy content for each column of the row
   var due = due_date.value;      // dummy content for each column of the row 
   var prio = priority.value;
   var remove = "<input type=button value=' X ' onClick='delRow()'>";
   
   // Put all pieces of data in an array for later used to create cell content of a row 
   var rowdata = [desc, due, prio, remove];
   
   // Find a <table> element to add row to (in this example, a table with id="mytable")
   var tableRef = document.getElementById("todoTable");
   
   // Use insertRow(index) method to create an empty <tr> element and add it to the table
   var newRow = tableRef.insertRow(tableRef.rows.length);  // table_object.rows.length returns the number of <tr> elements in the collection
   
   // Add event listener, on mouseover, set row index. This will be used when deleting a row
   newRow.onmouseover = function() {         
      tableRef.clickedRowIndex = this.rowIndex;   // rowIndex returns the position of a row in the rows collection of a table     
   };
   
   // Alternatively, use data-index to store index of the line 
   //  (note: data-* attributes can store arbitrary data with elements)
   // eg: <div id="elem" data-index=3></div>
   
   // Prepare content for each cell (or <td>) of the row
   var newCell = "";       
   var i = 0;          // In this example, each row has 4 columns. 
   // Use insertCell(index) method to insert new cells (<td> elements) at the 1st, 2nd, 3rd position of the new <tr> element        	      
   while (i < 4)
   {
      newCell = newRow.insertCell(i);            // specify which column 
      newCell.innerHTML = rowdata[i];            // assign what content  
      newCell.onmouseover = this.rowIndex;       // attach row index to the row
      i++;
   }
}  

function delRow()
{
   // since deletion action is unrecoverable, add hesitation to minimize/avoid user error 
   if (confirm("Press OK to delete. This action is unrecoverable.") == true)   
      document.getElementById("todoTable").deleteRow(document.getElementById("todoTable").clickedRowIndex);
}



