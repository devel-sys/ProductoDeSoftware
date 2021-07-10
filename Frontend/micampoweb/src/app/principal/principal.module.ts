import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PrincipalRoutingModule } from './principal-routing.module';

// Componentes
import { PrincipalComponent } from './principal.component';

// Google Maps
// import { AgmCoreModule } from '@agm/core';
import { MaterialModule } from '../material/material.module';

@NgModule({
  declarations: [
    PrincipalComponent
  ],
  imports: [
    CommonModule,
    PrincipalRoutingModule,
    // AgmCoreModule.forRoot({
    //   apiKey: 'AIzaSyBJ08xyWaO3mOEtoRHvw7g_fyXqI6LXHZc',
    //   libraries: ['places', 'drawing', 'geometry']
    // }),
    MaterialModule
  ],

})
export class PrincipalModule { }
