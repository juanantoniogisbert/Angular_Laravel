import { Component, OnInit } from '@angular/core';
import {HotelsService} from '../core';

@Component({
  selector: 'app-hotel',
  templateUrl: './hotel.component.html',
  styleUrls: ['./hotel.component.css']
})
export class HotelComponent implements OnInit {

  constructor(
    private hotelsService: HotelsService 
  ) {}

  hotels: string

  ngOnInit() {
    this.hotelsService.getAll().subscribe(data => {
      this.hotels = data;
    })
  }
}
