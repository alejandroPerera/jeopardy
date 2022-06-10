import { Component } from '@angular/core';
import { Order } from './order';

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
  constructor () {
    this.orderModel = new Order("","",null,"","",null);
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
