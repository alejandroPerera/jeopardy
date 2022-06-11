function makeAjaxCall(methodType, url, data_tosend)
{
   // if (data_tosend.length == 0)
   // {
   //    // document.getElementById ("txtHint").innerHTML = "";
   //    // document.getElementById ("txtYousay").innerHTML = "";
   //    return;
   // }
   //create promise obj
   var promiseObj = new Promise(function(resolve, reject){
      xhr = GetXmlHttpObject();
      if (xhr == null)
      {
         alert ("Your browser does not support XMLHTTP!");
         return;
      }
      // 6. Make an asynchronous request
      xhr.open(methodType, url, true);
   
      //specify the kind of data
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      //give name of data
   
      // 7. The request is sent to the server
      xhr.send(data_tosend);
      xhr.onreadystatechange = function(){
         if (xhr.readyState === 4){
            if (xhr.status === 200){
               var res = xhr.responseText;
               // callback_fn(res);
               resolve(res);
            }
            else{
               console.log("xhr failed");
               reject(xhr.status);
            }
         }
         else{
            console.log("still not done");
         }
      };
   
   
      // 8. Once the response is back the from the backend,
      //    the callback function is called to update the screen
      //    (this will be handled by the configuration above)
   
   
   
      
   });
   // 2. Create an instance of an XMLHttpRequest object
   


   // 3. specify a backend handler (URL to the backend)

   // var url  = "welcomeMsg.php";


   // 4. Assume we are going to send a GET request,
   //    use url rewriting to pass information the backend needs to process the request

   // url = url + "?StringSoFar=" + str;


   // 5. Configure the XMLHttpRequest instance.
   //    Register the callback function.
   //    Assume the callback function is named showHint(),
   //    don't forget to write code for the callback function at the bottom
   return promiseObj;


}

// 1. Add event listener to the input boxes.
//    Call makeAjaxCall() when the event happens
document.getElementById("fname").addEventListener("keyup", function() {
   var str_sofar = document.getElementById("fname").value;
   var data = "StringSoFar=" + str_sofar;
   makeAjaxCall("POST", "welcomeMsg.php", data).then(showHint, errorHandler);
} );
document.getElementById("yousay").addEventListener("keyup", function() {
   var str_sofar = document.getElementById("yousay").value;
   var data = "StringSoFar=" + str_sofar;
   makeAjaxCall("POST", "welcomeMsg.php", data).then(showHint2, errorHandler);
} );

// The callback function processes the response from the server
function showHint(str)
{
   // what do to with the response
   // if (xhr.readyState == 4 && xhr.status == 200) {
   //    //update the DOM
      document.getElementById('txtHint').textContent = str;
   // }
}

function showHint2(str){
   // if (xhr.readyState == 4 && xhr.status == 200) {
   //    //update the DOM
      document.getElementById('txtYousay').textContent = str;
   // }
}

function errorHandler(statusCode){
   console.log("failed with status ", statusCode);
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
