import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { UsuarioSesionComponent } from './usuario-sesion.component';

const routes: Routes = [
  { path: '', component: UsuarioSesionComponent }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class UsuarioSesionRoutingModule { }
