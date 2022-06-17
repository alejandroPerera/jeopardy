import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-question',
  templateUrl: './question.component.html',
  styleUrls: ['./question.component.css']
})
export class QuestionComponent implements OnInit {
  title : string;
  author : string;
  content: string;
  points : number;
  category : string;
  constructor() { 
    this.title = '';
    this.author = '';
    this.content = '';
    this.points = -1;
    this.category = ''
  }

  ngOnInit(): void {
  }

}
