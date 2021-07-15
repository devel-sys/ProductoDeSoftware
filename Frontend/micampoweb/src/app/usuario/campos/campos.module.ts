import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CamposRoutingModule } from './campos-routing.module';
import { CamposComponent } from './campos.component';
import { MapsModule } from 'src/app/core/components/maps/maps.module';
import { MatCardModule } from '@angular/material/card';


@NgModule({
  declarations: [
    CamposComponent
  ],
  imports: [
    CommonModule,
    CamposRoutingModule,
    MatCardModule,
    MapsModule
  ]
})
export class CamposModule { }
