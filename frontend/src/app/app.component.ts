import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { TaskService, TaskRowDto, TaskStatus } from './services/task.service';

interface TaskRow {
  id: number;
  task: string;
  taskType: string;
  assignee: string;
  status: TaskStatus;
  assignedDate: Date;
  completedDate: Date | null;
}

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
  title = 'to-do-project';
  taskForm!: FormGroup;
  tasks: TaskRow[] = [];

  constructor(private fb: FormBuilder, private tasksApi: TaskService) {}

  ngOnInit(): void {
    this.taskForm = this.fb.group({
      task: ['', Validators.required]
    });
    // Load existing tasks from backend
    this.tasksApi.list().subscribe(rows => {
      this.tasks = rows.map(r => ({
        ...r,
        assignedDate: new Date(r.assignedDate),
        completedDate: r.completedDate ? new Date(r.completedDate) : null
      }));
    });
  }

 onSubmit(): void {
  if (!this.taskForm.valid) return;

  // Grab form values
  const { task, taskType, assignee, status } = this.taskForm.value;

  // Build payload for backend
  const payload = {
    task,
    taskType: taskType || 'General',  // optional default
    assignee,
    status: status || 'Pending',      // default status
    assignedDate: new Date().toISOString(),
    completedDate: null
  };

  // Call the service
  this.tasksApi.create(payload).subscribe({
    next: (created) => {
      // Convert ISO strings to Date objects for display
      const row: TaskRow = {
        ...created,
        assignedDate: new Date(created.assignedDate),
        completedDate: created.completedDate ? new Date(created.completedDate) : null
      };

      // Add to local tasks array to update table
      this.tasks.push(row);

      // Reset form
      this.taskForm.reset({ task: '', taskType: '', assignee: '', status: 'Pending' });
    },
    error: (err) => {
      console.error('Failed to create task', err);
    }
  });
}


  markDone(row: TaskRow): void {
    if (row.status === 'Done') return;
    this.tasksApi.update(row.id, {
      status: 'Done',
      completedDate: new Date().toISOString()
    }).subscribe(updated => {
      row.status = updated.status;
      row.completedDate = updated.completedDate ? new Date(updated.completedDate) : null;
    });
  }

  deleteTask(id: number): void {
    this.tasksApi.remove(id).subscribe(() => {
      this.tasks = this.tasks.filter(t => t.id !== id);
    });
  }

  trackById(index: number, item: TaskRow) {
    return item.id;
  }
}
