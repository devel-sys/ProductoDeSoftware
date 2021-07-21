import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { CamposRoutingModule } from './campos-routing.module';
import { CamposComponent } from './campos.component';
import { MapsModule } from 'src/app/core/components/maps/maps.module';
import { MatCardModule } from '@angular/material/card';
import { MatIconModule } from '@angular/material/icon';
import { MatButtonModule } from '@angular/material/button';
import { MatDialogModule } from '@angular/material/dialog';
import { AddCampoComponent } from '../add-campo/add-campo.component';

@NgModule({
  declarations: [
    CamposComponent
  ],
  imports: [
    CommonModule,
    CamposRoutingModule,
    MatCardModule,
    MatButtonModule,
    MatIconModule,
    MapsModule,
    MatDialogModule
  ],
  entryComponents: [AddCampoComponent]
})
export class CamposModule { }
