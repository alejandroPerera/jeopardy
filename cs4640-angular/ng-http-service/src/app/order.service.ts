import { Injectable } from '@angular/core';
import { HttpClient, HttpErrorResponse, HttpParams } from '@angular/common/http';
import { Observable } from 'rxjs';


@Injectable({
  providedIn: 'root'
})
export class OrderService {

  constructor(private http: HttpClient) { }

  // controller -> order service's processOrder -> sendRequest
  processOrder(data: any): Observable<any> {
    //data clening, process, computation
    return this.sendRequest(data);
  }
  sendRequest(data: any): Observable<any> {
    return this.http.post<any>("http://localhost/cs4640/ng-php/ng-http-post.php" , data);
  }
}
