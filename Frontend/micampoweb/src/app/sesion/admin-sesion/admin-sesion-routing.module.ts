import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AdminSesionComponent } from './admin-sesion.component';

const routes: Routes = [
  { path: '', component: AdminSesionComponent }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class AdminSesionRoutingModule { }
