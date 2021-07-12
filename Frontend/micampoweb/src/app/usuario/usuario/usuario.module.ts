import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

// Modulos
import { UsuarioRoutingModule } from './usuario-routing.module';
import { MatButtonModule } from '@angular/material/button';
import { MatIconModule } from '@angular/material/icon';
import { MatListModule } from '@angular/material/list';
import { MatSidenavModule } from '@angular/material/sidenav';
import { MatToolbarModule } from '@angular/material/toolbar';

// Componentes
import { UsuarioComponent } from './usuario.component';
import { MenuOptionsComponent } from '../util/menu-options/menu-options.component';

@NgModule({
  declarations: [
    UsuarioComponent,
    MenuOptionsComponent
  ],
  imports: [
    CommonModule,
    UsuarioRoutingModule,
    MatSidenavModule,
    MatIconModule,
    MatToolbarModule,
    MatButtonModule,
    MatListModule
  ]
})

export class UsuarioModule { }
