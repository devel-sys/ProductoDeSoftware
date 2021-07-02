import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CamposRoutingModule } from './campos-routing.module';
import { CamposComponent } from './campos.component';


@NgModule({
  declarations: [
    CamposComponent
  ],
  imports: [
    CommonModule,
    CamposRoutingModule
  ]
})
export class CamposModule { }
