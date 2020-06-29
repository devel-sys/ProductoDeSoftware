import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UsuarioRoutingModule } from './usuario-routing.module';
import { UsuarioComponent } from './usuario.component';
import { SesionComponent } from '../sesion/sesion.component';
import { MisCamposComponent } from '../mis-campos/mis-campos.component';
import { MaterialModule } from 'src/app/material/material.module';
import { ReactiveFormsModule } from '@angular/forms';


@NgModule({
  declarations: [

    UsuarioComponent,
    SesionComponent,
    MisCamposComponent
  ],
  imports: [
    CommonModule,
    UsuarioRoutingModule,
    MaterialModule,
    ReactiveFormsModule
    
  ]
})
export class UsuarioModule { }
