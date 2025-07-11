<x-app-layout>
    <div class="flex h-screen">

        <main class="dashboard-content">
            <header class="dashboard-header">
                <h1>Clients</h1>
                <a href="{{ route('clients.create') }}" class="button add-button">Manage Client</a>
            </header>

            <div class="dashboard-table-container">
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->email }}</td>
                                <td>
                                    <a href="{{ route('clients.show', $client->id) }}"
                                        class="button view-button">View</a>
                                    <a href="{{ route('clients.edit', $client->id) }}"
                                        class="button edit-button">Edit</a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button delete-button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <!-- Dashboard Styling -->
    <style>
        .dashboard-container {
            display: flex;
            height: 100vh;
        }

        .dashboard-sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .dashboard-sidebar h2 {
            margin-bottom: 20px;
        }

        .dashboard-sidebar ul {
            list-style: none;
            padding: 0;
        }

        .dashboard-sidebar ul li {
            margin-bottom: 10px;
        }

        .dashboard-sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px;
            display: block;
            border-radius: 5px;
        }

        .dashboard-sidebar ul li a.active,
        .dashboard-sidebar ul li a:hover {
            background-color: #34495e;
        }

        .dashboard-content {
            flex: 1;
            padding: 20px;
            background-color: #f5f5f5;
            overflow-y: auto;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .dashboard-header h1 {
            margin: 0;
        }

        .button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }

        .add-button {
            background-color: #2ecc71;
            color: #fff;
        }

        .add-button:hover {
            background-color: #27ae60;
        }

        .view-button {
            background-color: #3498db;
            color: #fff;
        }

        .edit-button {
            background-color: #f1c40f;
            color: #fff;
        }

        .delete-button {
            background-color: #e74c3c;
            color: #fff;
        }

        .delete-button:hover {
            background-color: #c0392b;
        }

        .dashboard-table-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .dashboard-table {
            width: 100%;
            border-collapse: collapse;
        }

        .dashboard-table th,
        .dashboard-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .dashboard-table th {
            background-color: #f4f4f4;
        }

        .dashboard-table tr:hover {
            background-color: #f9f9f9;
        }
    </style>

</x-app-layout>
