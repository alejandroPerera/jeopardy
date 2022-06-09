import { Component } from '@angular/core';
import { Order } from './order';
import {OrderService } from './order.service';
import { ThisReceiver } from '@angular/compiler';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Form and input validation';

  drinks = ['coffe', 'tea', 'juice'];

  orderModel : Order;
  orderList: Array<Order> = [];
  constructor (private orderService: OrderService) {
    this.orderModel = new Order("someone","someone@uva.edu",9999999999,"tea","hot",true);
    // this.orderModel = new Order("","",null,"","",null);
  }
  responsedata: any;
  // onSubmit(form: any): void {

  //   let params = JSON.stringify(form);

  //   //this.http.get<any>("http://localhost/cs4640/ng-php/ng-http-get.php?str=" + params)
  //   this.http.post<any>("http://localhost/cs4640/ng-php/ng-http-post.php" , params)
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


  onSubmit_OrderList(formdata: any): void {
    let form_entry = new Order(formdata.name, formdata.email, formdata.phone, formdata.drink_option, formdata.tempPreference, formdata.sendmsg)
    this.orderList.push(form_entry);
    let params = JSON.stringify(this.orderList);

    //this.http.get<any>("http://localhost/cs4640/ng-php/ng-http-get.php?str=" + params)
    this.orderService.processOrder(params)
      .subscribe({
        next: (data) => {
          //display the response data on screen
          this.responsedata = data;
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
  confirm_msg = '';
  // confirm_msg : string;
  confirmOrder(formdata: any): void {
    console.log(formdata);

    let form_entry = new Order(formdata.name, formdata.email, formdata.phone, formdata.drink_option, formdata.tempPreference, formdata.sendmsg)
    this.orderList.push(form_entry);
    this.confirm_msg = "Thank you, " + formdata.name + ".";
    this.confirm_msg += "You ordered " + formdata.drink_option + ".";
    if (formdata.sendmsg)
      this.confirm_msg += " We will text you once it's done.";
  }

  darkMode = false;
  changeDarkMode() {
    this.darkMode = !this.darkMode;
  }
}
