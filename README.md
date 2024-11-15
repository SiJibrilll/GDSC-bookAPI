# GDSC Book API

A RESTful API for managing book-related operations

## API Endpoints

### 1. **GET /api/books**
   Retrieves a list of all books in the database.
   - **Example Response**:
     ```json
     [
       {
         "id": 1,
         "title": "Book Title",
         "author": "Author Name",
         "published_year": 2023
       },
       {
         "id": 2,
         "title": "Book Title",
         "author": "Author Name",
         "published_year": 2023
       }
     ]
     ```

### 2. **GET /api/books/{id}**
   Fetches details of a specific book by its ID.
   - **Parameters**: 
     - `id` _(integer)_: Unique identifier of the book.
   - **Example Response**:
     ```json
     {
       "id": 1,
       "title": "Book Title",
       "author": "Author Name",
       "published_year": 2023
     }
     ```

### 3. **POST /api/books**
   Adds a new book to the collection.
   - **Request Body**:
     ```json
     {
       "title": "New Book Title",
       "author": "Author Name",
       "published_year": 2024
     }
     ```
   - **Example Response**:
     ```json
     {
       "message": "Book added successfully",
       "book": {
         "id": 2,
         "title": "New Book Title",
         "author": "Author Name",
         "published_year": 2024
       }
     }
     ```

### 4. **PUT /api/books/{id}**
   Updates the details of an existing book.
   - **Parameters**:
     - `id` _(integer)_: Unique identifier of the book.
   - **Request Body**:
     ```json
     {
       "title": "Updated Title",
       "author": "Updated Author",
       "published_year": 2025
     }
     ```
   - **Example Response**:
     ```json
     {
       "message": "Book updated successfully"
     }
     ```

### 5. **DELETE /api/books/{id}**
   Deletes a book from the collection by its ID.
   - **Parameters**:
     - `id` _(integer)_: Unique identifier of the book.
   - **Example Response**:
     ```json
     {
       "message": "Book deleted successfully"
     }
     ```

