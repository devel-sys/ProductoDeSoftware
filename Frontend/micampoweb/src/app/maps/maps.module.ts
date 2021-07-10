import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { OlMapsComponent } from './ol-maps/ol-maps.component';
import { GoogleMapsComponent } from './google-maps/google-maps.component';
import { LeafletComponent } from './leaflet/leaflet.component';

@NgModule({
  declarations: [
    OlMapsComponent,
    GoogleMapsComponent,
    LeafletComponent
  ],
  imports: [
    CommonModule
  ],
  exports: [OlMapsComponent]
})
export class MapsModule { }
