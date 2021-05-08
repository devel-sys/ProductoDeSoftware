import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UsuarioRoutingModule } from './usuario-routing.module';
import { UsuarioComponent } from './usuario.component';
import { AddCampoComponent } from './add-campo/add-campo.component';
import { CamposComponent } from './campos/campos.component';
import { MapsModule } from '../maps/maps.module';

@NgModule({
  declarations: [
    UsuarioComponent, 
    AddCampoComponent, 
    CamposComponent],
  imports: [
    CommonModule,
    UsuarioRoutingModule,
    MapsModule
  ]
})
export class UsuarioModule { }
