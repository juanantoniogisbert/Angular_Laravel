import { NgModule } from '@angular/core';
import { HotelComponent } from './hotel.component';
import { HotelRoutingModule } from './hotel-routing.module';
import { SharedModule } from '../shared';

@NgModule({
  imports: [
    SharedModule,
    HotelRoutingModule
  ],
  declarations: [
    HotelComponent
  ]
})
export class HotelModule { }
