import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ProyectoCultivoComponent } from './proyecto-cultivo.component';

const routes: Routes = [
  { path: '', component: ProyectoCultivoComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProyectoCultivoRoutingModule { }
