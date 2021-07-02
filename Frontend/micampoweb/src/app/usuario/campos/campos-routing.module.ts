import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CamposComponent } from './campos.component';

const routes: Routes = [
  { path: '', component: CamposComponent}
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class CamposRoutingModule { }
