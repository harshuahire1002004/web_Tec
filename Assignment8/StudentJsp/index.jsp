<%@ page import="java.sql.*" %>
<html>  
<body>  

<% out.print("<h1>Hello World !! Welcome to JSP</h1>"); %>


<h2>Welcome to Sanjivani College of Engineering, IT Department</h2>

<%
String action = request.getParameter("action"); 
String id = request.getParameter("student_id");
String name = request.getParameter("student_name");
String className = request.getParameter("student_class");
String division = request.getParameter("student_division");
String city = request.getParameter("student_city");

try { 
    Class.forName("com.mysql.cj.jdbc.Driver");  // Updated driver
    Connection con = DriverManager.getConnection(
        "jdbc:mysql://localhost:3306/student_db?useSSL=false&serverTimezone=UTC",
        "root",
        ""
    );
    Statement stmt = con.createStatement();

    if ("insert".equals(action)) {
        String sql = "INSERT INTO student_info (id, name, class, division, city) VALUES ('" 
                      + id + "', '" + name + "', '" + className + "', '" + division + "', '" + city + "')";
        stmt.executeUpdate(sql);
        out.println("<p>Record inserted successfully!</p>");
    }
    else if ("update".equals(action)) {
        // Build the update query dynamically based on provided fields
        StringBuilder sql = new StringBuilder("UPDATE student_info SET ");
        boolean first = true;

        if (name != null && !name.isEmpty()) {
            if (!first) sql.append(", ");
            sql.append("name='" + name + "'");
            first = false;
        }
        if (className != null && !className.isEmpty()) {
            if (!first) sql.append(", ");
            sql.append("class='" + className + "'");
            first = false;
        }
        if (division != null && !division.isEmpty()) {
            if (!first) sql.append(", ");
            sql.append("division='" + division + "'");
            first = false;
        }
        if (city != null && !city.isEmpty()) {
            if (!first) sql.append(", ");
            sql.append("city='" + city + "'");
        }

        sql.append(" WHERE id='" + id + "'");
        
        // Execute the update query
        stmt.executeUpdate(sql.toString());
        out.println("<p>Record updated successfully!</p>");
    }
    else if ("delete".equals(action)) {
        String sql = "DELETE FROM student_info WHERE id='" + id + "'";
        stmt.executeUpdate(sql);
        out.println("<p>Record deleted successfully!</p>");
    }

%>

<table border='5'>
<tr>
  <th>ID</th><th>Name</th><th>Class</th><th>Division</th><th>City</th>
</tr>

<%
    ResultSet rs = stmt.executeQuery("SELECT * FROM student_info");
    while (rs.next()) {
%>
<tr>
  <td><%= rs.getInt("id") %></td>
  <td><%= rs.getString("name") %></td>
  <td><%= rs.getString("class") %></td>
  <td><%= rs.getString("division") %></td>
  <td><%= rs.getString("city") %></td>
</tr>
<%
    }
    con.close();
} catch(Exception e) { 
    out.println("<p>Error: " + e + "</p>");
} 
%>
</table>

<h2>Manage Student Records</h2>
<form method="post">
    Student ID: <input type="text" name="student_id" required><br>
    Name: <input type="text" name="student_name"><br>
    Class: <input type="text" name="student_class"><br>
    Division: <input type="text" name="student_division"><br>
    City: <input type="text" name="student_city"><br><br>

    <button type="submit" name="action" value="insert">Insert</button>
    <button type="submit" name="action" value="update">Update</button>
    <button type="submit" name="action" value="delete">Delete</button>
</form>

</body>  
</html>
