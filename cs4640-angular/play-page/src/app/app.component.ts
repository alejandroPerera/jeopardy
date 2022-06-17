import { Component } from '@angular/core';
// import { question } from './question/question.component';


@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'play-page';
  questionList : Array<question> = [];
}
