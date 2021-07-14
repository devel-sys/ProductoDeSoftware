import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { OlMapsComponent } from './ol-maps/ol-maps.component';
import { GoogleMapsComponent } from './google-maps/google-maps.component';
import { LeafletComponent } from './leaflet/leaflet.component';
import { GoogleMapsModule } from '@angular/google-maps';
// import { AgmCoreModule } from '@agm/core';

@NgModule({
  declarations: [
    OlMapsComponent,
    GoogleMapsComponent,
    LeafletComponent
  ],
  imports: [
    CommonModule,
    GoogleMapsModule,
  ],
  exports: [
    OlMapsComponent,
    GoogleMapsComponent,
    LeafletComponent
  ]
})
export class MapsModule { }
