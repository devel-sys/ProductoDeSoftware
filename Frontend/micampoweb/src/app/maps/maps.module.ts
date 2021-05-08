import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { OlMapsComponent } from './ol-maps/ol-maps.component';

@NgModule({
  declarations: [
    OlMapsComponent
  ],
  imports: [
    CommonModule
  ],
  exports: [OlMapsComponent]
})
export class MapsModule { }
