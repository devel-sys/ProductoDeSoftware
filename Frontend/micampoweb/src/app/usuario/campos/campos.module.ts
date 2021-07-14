import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CamposRoutingModule } from './campos-routing.module';
import { CamposComponent } from './campos.component';
import { MapsModule } from 'src/app/core/components/maps/maps.module';


@NgModule({
  declarations: [
    CamposComponent
  ],
  imports: [
    CommonModule,
    CamposRoutingModule,
    MapsModule
  ]
})
export class CamposModule { }
