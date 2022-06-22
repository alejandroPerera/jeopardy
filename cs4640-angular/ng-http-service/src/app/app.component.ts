// import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { Component } from '@angular/core';
import { Order } from './order';
import { OrderService } from './order.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Form and input validation';

  drinks = ['coffee', 'tea', 'juice'];

  orderModel: Order;
  orderList: Array<Order> = []; 
  constructor(private orderService: OrderService) { 
    this.orderModel = new Order("someone", "someone@uva.edu", 9999999999, "tea", "hot", true);
    // this.orderModel = new Order("", "", null, "", "", null);
  }

  responsedata: any;

  // take a single order
  // onSubmit(form: any): void { 
  //   console.log('You submitted ', form);

  //   // Angular and PHP -- json 
  //   let params = JSON.stringify(form);    // convert form data object to json format (string)

  //   // url rewriting; get() return observable 
  //   // (return 3 kinds of notifications complete, next, error)
  //   // this.http.get<any>('http://localhost/cs4640/ng-php/ng-http-get.php?str=' + params)
  //   this.http.post<any>('http://localhost/cs4640/ng-php/ng-http-post.php', params)
  //     .subscribe({
  //       next: (data) => { 
  //         // what to with the date received from backend
  //         // let's display the response data on screen
  //         this.responsedata = data;
  //         console.log('response data ', this.responsedata);
  //       }, 
  //       error: (e) => { 
  //         // error handling 
  //         console.log('Error ', e);
  //       }, 
  //       complete: () => { 
  //         // what to do when it's complete
  //         console.log('complete');
  //       }
  //     });
  // }

  onSubmit_OrderList(formdata: any): void { 
    console.log('You submitted ', formdata);
    let form_entry = new Order(formdata.name, formdata.email, 
                              formdata.phone, formdata.drink_option, 
                              formdata.tempPreference, formdata.sendmsg);
    this.orderList.push(form_entry);

    let params = JSON.stringify(this.orderList);    // convert form data object to json format (string)

    // url rewriting; get() return observable 
    // (return 3 kinds of notifications complete, next, error)
    // this.http.get<any>('http://localhost/cs4640/ng-php/ng-http-get.php?str=' + params)
    // this.http.post<any>('http://localhost/cs4640/ng-php/ng-http-post.php', params)
    this.orderService.processOrder(params)
      .subscribe({
        next: (data) => { 
          // what to with the date received from backend
          // let's display the response data on screen
          this.responsedata = data;
          console.log('response data ', this.responsedata);
        }, 
        error: (e) => { 
          // error handling 
          console.log('Error ', e);
        }, 
        complete: () => { 
          // what to do when it's complete
          console.log('complete');
        }
      });
  }

  confirm_msg = ''; 
  // confirm_msg: string; 
  confirmOrder(formdata: any): void { 
    console.log(formdata); 

    let form_entry = new Order(formdata.name, formdata.email, 
                    formdata.phone, formdata.drink_option, 
                    formdata.tempPreference, formdata.sendmsg);
    this.orderList.push(form_entry);
    
    this.confirm_msg = "Thank you, " + formdata.name + "."; 
    this.confirm_msg += " You ordered " + formdata.drink_option + ".";
    if (formdata.sendmsg) 
      this.confirm_msg += " We will text you once it's done.";
    
  }

  darkMode = false;
  changeDarkMode() { 
    this.darkMode = !this.darkMode;
  }

}
