import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { AddCampoComponent } from './add-campo.component';

describe('AddCampoComponent', () => {
  let component: AddCampoComponent;
  let fixture: ComponentFixture<AddCampoComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ AddCampoComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AddCampoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
