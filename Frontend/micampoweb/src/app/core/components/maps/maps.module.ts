import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

// Componentes
import { GoogleMapsComponent } from './google-maps/google-maps.component';

// Google Maps
import { AgmCoreModule } from '@agm/core';
import { OlMapsComponent } from './ol-maps/ol-maps.component';
import { LeafletComponent } from './leaflet/leaflet.component';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { MatCardModule } from '@angular/material/card';

@NgModule({
  declarations: [
    OlMapsComponent,
    GoogleMapsComponent,
    LeafletComponent
  ],
  imports: [
    CommonModule,
    FormsModule,
    ReactiveFormsModule,
    MatFormFieldModule,
    MatInputModule,
    MatCardModule,
    AgmCoreModule.forRoot({
      apiKey: 'AIzaSyBJ08xyWaO3mOEtoRHvw7g_fyXqI6LXHZc',
      libraries: ['places', 'drawing', 'geometry']
    })
  ],
  exports: [
    OlMapsComponent,
    GoogleMapsComponent,
    LeafletComponent
  ]
})
export class MapsModule { }
