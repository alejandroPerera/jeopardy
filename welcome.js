function makeAjaxCall(str, showHint)
{
   if (str.length == 0)
   {
      // document.getElementById ("txtHint").innerHTML = "";
      // document.getElementById ("txtYousay").innerHTML = "";
      return;
   }

   // 2. Create an instance of an XMLHttpRequest object
   xhr = GetXmlHttpObject();
   if (xhr == null)
   {
      alert ("Your browser does not support XMLHTTP!");
      return;
   }


   // 3. specify a backend handler (URL to the backend)

   var url  = "welcomeMsg.php";


   // 4. Assume we are going to send a GET request,
   //    use url rewriting to pass information the backend needs to process the request

   // url = url + "?StringSoFar=" + str;


   // 5. Configure the XMLHttpRequest instance.
   //    Register the callback function.
   //    Assume the callback function is named showHint(),
   //    don't forget to write code for the callback function at the bottom
   xhr.onreadystatechange = showHint;


   // 8. Once the response is back the from the backend,
   //    the callback function is called to update the screen
   //    (this will be handled by the configuration above)



   // 6. Make an asynchronous request
   xhr.open("POST", url, true);

   //specify the kind of data
   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   //give name of data

   // 7. The request is sent to the server
   xhr.send("StringSoFar="+str);


}

// 1. Add event listener to the input boxes.
//    Call makeAjaxCall() when the event happens
document.getElementById("fname").addEventListener("keyup", function() {
   var str_sofar = document.getElementById("fname").value;
   makeAjaxCall(str_sofar, showHint);
} );
document.getElementById("yousay").addEventListener("keyup", function() {
   var yousay = document.getElementById("yousay").value;
   makeAjaxCall(yousay, showHint2);
} );

// The callback function processes the response from the server
function showHint()
{
   // what do to with the response
   if (xhr.readyState == 4 && xhr.status == 200) {
      //update the DOM
      document.getElementById('txtHint').textContent = xhr.responseText;
   }
}

function showHint2(){
   if (xhr.readyState == 4 && xhr.status == 200) {
      //update the DOM
      document.getElementById('txtYousay').textContent = xhr.responseText;
   }
}



function GetXmlHttpObject()
{
   // Create an XMLHttpRequest object
	
   if (window.XMLHttpRequest)
   {  // code for IE7+, Firefox, Chrome, Opera, Safari
      return new XMLHttpRequest();
   }
   if (window.ActiveXObject)
   { // code for IE6, IE5
     return new ActiveXObject ("Microsoft.XMLHTTP");
   }
   return null;
}
