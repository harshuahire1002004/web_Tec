import jakarta.servlet.http.*;  
import jakarta.servlet.*;  
import java.io.*; 
import java.sql.*;  

public class FirstServlet extends HttpServlet {  

    public void doGet(HttpServletRequest req, HttpServletResponse res)  
    throws ServletException, IOException {  
        res.setContentType("text/html");  
        PrintWriter pw = res.getWriter();  

        pw.println("<html><body>");
        pw.println("<h2>Welcome to Pragati eBookShop</h2>");  

        try {
            // Updated driver
            Class.forName("com.mysql.cj.jdbc.Driver");  
            // Updated database name
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/pragati", "root", "");

            Statement stmt = con.createStatement();  
            ResultSet rs = stmt.executeQuery("SELECT * FROM ebookshop");  

            pw.println("<table border='1'>");  
            pw.println("<tr><th>Book ID</th><th>Title</th><th>Author</th><th>Price</th><th>Quantity</th></tr>");

            while(rs.next()) {
                pw.println("<tr><td>" + rs.getInt(1) + "</td><td>" + rs.getString(2) + "</td><td>" + rs.getString(3) +
                        "</td><td>" + rs.getDouble(4) + "</td><td>" + rs.getInt(5) + "</td></tr>");
            }

            pw.println("</table>");

            pw.println("<h3>Insert / Update / Delete Book</h3>");
            pw.println("<form method='post'>");
            pw.println("ID: <input type='text' name='id'/><br/>");
            pw.println("Title: <input type='text' name='title'/><br/>");
            pw.println("Author: <input type='text' name='author'/><br/>");
            pw.println("Price: <input type='text' name='price'/><br/>");
            pw.println("Quantity: <input type='text' name='qty'/><br/>");
            pw.println("<input type='submit' name='action' value='Insert'/>");
            pw.println("<input type='submit' name='action' value='Update'/>");
            pw.println("<input type='submit' name='action' value='Delete'/>");
            pw.println("</form>");

            con.close();
        } catch(Exception e) {
            pw.println("<p style='color:red;'>Error: " + e.getMessage() + "</p>");
        }

        pw.println("</body></html>");
        pw.close();  
    }

    public void doPost(HttpServletRequest req, HttpServletResponse res)  
    throws ServletException, IOException {  
        res.setContentType("text/html");  
        PrintWriter pw = res.getWriter();  

        String id = req.getParameter("id");  
        String title = req.getParameter("title");  
        String author = req.getParameter("author");  
        String price = req.getParameter("price");  
        String qty = req.getParameter("qty");  
        String action = req.getParameter("action");

        try {
            Class.forName("com.mysql.cj.jdbc.Driver");  
            Connection con = DriverManager.getConnection("jdbc:mysql://localhost:3306/pragati", "root", "");

            PreparedStatement ps;
            int result = 0;

            switch(action) {
                case "Insert":
                    ps = con.prepareStatement("INSERT INTO ebookshop VALUES (?, ?, ?, ?, ?)");
                    ps.setInt(1, Integer.parseInt(id));
                    ps.setString(2, title);
                    ps.setString(3, author);
                    ps.setDouble(4, Double.parseDouble(price));
                    ps.setInt(5, Integer.parseInt(qty));
                    result = ps.executeUpdate();
                    pw.println("<p style='color:green;'>Book inserted successfully!</p>");
                    break;

                case "Update":
                    ps = con.prepareStatement("UPDATE ebookshop SET book_title=?, book_author=?, book_price=?, quantity=? WHERE book_id=?");
                    ps.setString(1, title);
                    ps.setString(2, author);
                    ps.setDouble(3, Double.parseDouble(price));
                    ps.setInt(4, Integer.parseInt(qty));
                    ps.setInt(5, Integer.parseInt(id));
                    result = ps.executeUpdate();
                    pw.println("<p style='color:green;'>Book updated successfully!</p>");
                    break;

                case "Delete":
                    ps = con.prepareStatement("DELETE FROM ebookshop WHERE book_id=?");
                    ps.setInt(1, Integer.parseInt(id));
                    result = ps.executeUpdate();
                    pw.println("<p style='color:green;'>Book deleted successfully!</p>");
                    break;
            }

            con.close();
        } catch(Exception e) {
            pw.println("<p style='color:red;'>Error: " + e.getMessage() + "</p>");
        }

        // Reload data
        doGet(req, res);
    }
}
