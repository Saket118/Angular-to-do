import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export type TaskStatus = 'Pending' | 'In Progress' | 'Done';

export interface TaskRowDto {
  id: number;
  task: string;
  taskType: string;
  assignee: string;
  status: TaskStatus;
  assignedDate: string;     // ISO string from backend
  completedDate: string | null;
}

@Injectable({
  providedIn: 'root'
})
export class TaskService {
  // 👇 this should point to your CI4 backend route
  private baseUrl = "http://localhost/ci4_project/todo/tasks";

  constructor(private http: HttpClient) {}

  /** Get all tasks */
  list(): Observable<TaskRowDto[]> {
    return this.http.get<TaskRowDto[]>(this.baseUrl);
  }

  /** Get single task by id */
  get(id: number): Observable<TaskRowDto> {
    return this.http.get<TaskRowDto>(`${this.baseUrl}/${id}`);
  }

  /** Create new task */
  create(dto: Partial<TaskRowDto>): Observable<TaskRowDto> {
    return this.http.post<TaskRowDto>(this.baseUrl, dto);
  }

  /** Update existing task */
  update(id: number, changes: Partial<TaskRowDto>): Observable<TaskRowDto> {
    return this.http.put<TaskRowDto>(`${this.baseUrl}/${id}`, changes);
  }

  /** Delete task */
  remove(id: number): Observable<void> {
    return this.http.delete<void>(`${this.baseUrl}/${id}`);
  }
}
