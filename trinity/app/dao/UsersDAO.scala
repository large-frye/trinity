package dao

import models.{User, Users}
import play.api.Play.current
import play.api.db.DB
import slick.driver.MySQLDriver.api._

import scala.concurrent.ExecutionContext.Implicits.global
import scala.concurrent.Future

/**
 * Created by frye on 9/9/15.
 */
object UsersDAO {
  val users = TableQuery[Users]

  def db: Database = Database.forDataSource(DB.getDataSource())

  def filterQuery(id: Int): Query[Users, User, Seq] = {
    users.filter(_.id === id)
  }

  def findById(id: Int): Future[Option[User]] = {
    try db.run(filterQuery(id).result.headOption)
    finally db.close
  }

  def find(): Future[Seq[User]] = {
    try db.run(users.result)
    finally db.close
  }

//  def create(u: User): Future[Option[User]] = {
//    val sql = (users returning users.map(_.*)) += u
//    try db.run(sql)
//    finally db.close
//  }

}
