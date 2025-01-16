# Library Management System API

## **Overview**
The Library Management System API is a Flask-based web application that provides functionality to manage books and users in a library. It supports basic CRUD operations for books and user authentication using a MySQL database.

---

## **Features**
1. **Book Management:**
   - Add new books to the inventory.
   - Retrieve a list of all available books.
   - Update book details (title, author, genre, availability status, etc.).
   - Delete books from the inventory.
   - Filter books by genre, author, or publication year.

2. **User Management:**
   - User registration.
   - User login and session management.

3. **Authentication:**
   - Login system with session management.
   - Role-based access control (e.g., admin or regular user).

4. **Database:**
   - Uses MySQL for data storage.

---

## **Technologies Used**
- **Backend Framework:** Flask
- **Database:** MySQL
- **Frontend (Optional):** HTML templates (e.g., for login and dashboard)
- **Libraries:**
  - Flask extensions: `Flask-MySQLdb`, `Flask-Session`
  - Others: `MySQLdb`, `Werkzeug`

---

## **Setup Instructions**

### Prerequisites
1. Python (version 3.7 or later)
2. MySQL Server
3. pip (Python package manager)

---

### **Step 1: Clone the Repository**
```bash
git clone <repository-url>
cd Library_management_system
```

### **Step 2: Create a Virtual Environment**
```bash
python -m venv venv
source venv/bin/activate   # On Windows: venv\Scripts\activate
```

### **Step 3: Install Dependencies**
Install all required Python libraries:
```bash
pip install -r requirements.txt
```

### **Step 4: Configure the Database**
1. Create a MySQL database named `library` (or a name of your choice):
   ```sql
   CREATE DATABASE library;
   ```

2. Import the schema:
   ```bash
   mysql -u <username> -p library < schema.sql
   ```
   Replace `<username>` with your MySQL username. The `schema.sql` file should contain the table structure for the `user` and `books` tables.

3. Update the database connection details in `config.py`:
   ```python
   MYSQL_HOST = 'localhost'
   MYSQL_USER = '<your-mysql-username>'
   MYSQL_PASSWORD = '<your-mysql-password>'
   MYSQL_DB = 'library'
   ```

---

### **Step 5: Run the Flask Application**
1. Start the Flask development server:
   ```bash
   python app.py
   ```

2. The application will be accessible at:
   ```
http://127.0.0.1:5000
   ```

---

## **API Endpoints**

### **Books Endpoints**
| Method | Endpoint          | Description                                      |
|--------|-------------------|--------------------------------------------------|
| GET    | `/books`          | Retrieve a list of all books.                   |
| GET    | `/books?filter`   | Filter books by genre, author, or year.         |
| POST   | `/books`          | Add a new book.                                 |
| PUT    | `/books/<id>`     | Update details of a specific book by ID.        |
| DELETE | `/books/<id>`     | Delete a specific book by ID.                   |

### **User Endpoints**
| Method | Endpoint          | Description                                      |
|--------|-------------------|--------------------------------------------------|
| POST   | `/register`       | Register a new user.                            |
| POST   | `/login`          | Login a user.                                   |
| GET    | `/logout`         | Logout the current user.                        |

---

## **Testing the API**

### **Using Postman**
1. Download and install [Postman](https://www.postman.com/).
2. Use the following steps to test:
   - Set the method (e.g., GET, POST) and the endpoint URL.
   - For POST/PUT requests, add a JSON body with required fields.
   - Check responses for validation.

### **Using Browser**
- You can test `GET` endpoints directly by visiting URLs (e.g., `http://127.0.0.1:5000/books`).

---

## **Project Structure**
```
Library_management_system/
|
|-- app.py               # Main application file
|-- config.py            # Configuration file (database settings, etc.)
|-- schema.sql           # Database schema
|-- templates/           # HTML templates for web pages
|   |-- login.html       # Login page
|   |-- dashboard.html   # Dashboard page
|-- static/              # Static files (CSS, JS, etc.)
|-- requirements.txt     # Python dependencies
```

---

## **Troubleshooting**

### **Common Issues**
1. **`MySQLdb.OperationalError: (1136, "Column count doesn't match value count at row 1")`:**
   - Ensure the number of columns in the `INSERT` query matches the table structure.

2. **Database Connection Errors:**
   - Verify MySQL server is running.
   - Check credentials in `config.py`.

### **Logs**
- Check the terminal logs for detailed error messages during debugging.

---

## **Future Enhancements**
1. Add JWT-based authentication for better security.
2. Implement pagination for the `/books` endpoint.
3. Add an admin panel for managing users and roles.
4. Integrate advanced search features (e.g., full-text search).

---

## **Contributors**
- [Your Name] - Developer

---

## **License**
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

