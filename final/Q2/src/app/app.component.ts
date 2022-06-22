import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { Component } from '@angular/core';
import { Order } from './order';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Temperature Comparation';
  
  orderModel: Order;
  constructor(private http: HttpClient) { 
    this.orderModel = new Order(null, null, null, null, null, null, null, null, null, null);
  }

  responsedata: any;

  // take a single order
  onSubmit(form: any): void { 
    console.log('You submitted ', form);

    // Angular and PHP -- json 
    let params = JSON.stringify(form);    // convert form data object to json format (string)
    console.log(params);
    this.http.post<any>('http://localhost/cs4640/ng-php/wc3pka-Q2-ng-http-post.php', params)
      .subscribe({
        next: (data: any) => { 
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
}
