import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { UsuarioRoutingModule } from './usuario-routing.module';
import { UsuarioComponent } from './usuario.component';
import { SesionComponent } from '../sesion/sesion.component';
import { MisCamposComponent } from '../mis-campos/mis-campos.component';
import { MaterialModule } from 'src/app/material/material.module';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { RegistroComponent } from '../registro/registro.component';


@NgModule({
  declarations: [

    UsuarioComponent,
    SesionComponent,
    MisCamposComponent,
    RegistroComponent
  ],
  imports: [
    CommonModule,
    UsuarioRoutingModule,
    MaterialModule,
    ReactiveFormsModule,
    FormsModule
    
  ]
})
export class UsuarioModule { }
