import { Component } from '@angular/core';
import { User } from './user';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { ThisReceiver } from '@angular/compiler';

import { RouterModule, Routes } from '@angular/router';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})

export class AppComponent {
  message = 'Hello Stranger!';

  userModel : User;
  userList: Array<User> = [];
  constructor (private http: HttpClient) {
    this.userModel = new User("","","","");
  }
  responsedata: any;
  msg: String = "";
  show: boolean = false;
  onSubmit(form: any): void {

    let form_entry = new User(form.firstName, form.lastName, form.email, form.password)
    this.userList.push(form_entry);
    let params = JSON.stringify(form); //single user 

    //this.http.post<any>("http://localhost/github/cs4640/ng-php/ng-http-post.php" , params)
    this.http.post<any>("http://localhost/github/cs4640/Assignment%203/ng-signup-handler.php" , params)
      .subscribe({
        next: (data) => {
          //display the response data on screen
          this.responsedata = data;
          this.msg = data[0];
          
          this.show = true;
          console.log('response data ', this.responsedata);
        },
        error: (e) =>{
          console.log('Error ', e);
        },
        complete: () => {
          console.log('complete');
        }
      });
  }






  // onSubmitUserList(formdata: any): void {
  //   let form_entry = new User(formdata.firstName, formdata.lastName, formdata.email, formdata.password)
  //   this.userList.push(form_entry);
  //   let params = JSON.stringify(this.userList);

  //   //this.http.post<any>("http://localhost/cs4640/ng-php/ng-http-post.php" , params)
  //   this.http.post<any>("http://localhost/github/cs4640/ng-php/ng-http-post.php" , params)
  //     .subscribe({
  //       next: (data) => {
  //         //display the response data on screen
  //         this.responsedata = data;
  //         console.log('response data ', this.responsedata);
  //       },
  //       error: (e) =>{
  //         console.log('Error ', e);
  //       },
  //       complete: () => {
  //         console.log('complete');
  //       }
  //     });
  // }


  darkMode = false;
  changeDarkMode() {
    this.darkMode = !this.darkMode;
  }
}
