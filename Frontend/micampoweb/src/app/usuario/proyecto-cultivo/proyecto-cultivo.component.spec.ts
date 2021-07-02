import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProyectoCultivoComponent } from './proyecto-cultivo.component';

describe('ProyectoCultivoComponent', () => {
  let component: ProyectoCultivoComponent;
  let fixture: ComponentFixture<ProyectoCultivoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProyectoCultivoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProyectoCultivoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
