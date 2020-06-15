import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from 'src/app/home/home/home.component';

const routes: Routes = [
  {path:'', pathMatch: 'full', redirectTo:'home'},
  {path:'home', component : HomeComponent},
  
]

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule]
})
export class RouteModule { }
