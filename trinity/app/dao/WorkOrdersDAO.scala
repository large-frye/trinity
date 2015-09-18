package dao

// Model

import java.sql.Timestamp

import models.WorkOrder

// Play API
import play.api.Play.current
import play.api.db.DB
import play.api.libs.json._
import play.api.libs.json.Reads._
import play.api.libs.functional.syntax._

// Scala
import scala.concurrent.ExecutionContext.Implicits.global
import scala.concurrent.Future

/**
 * Created by frye on 9/17/15.
 */
object WorkOrdersDAO extends WorkOrder {
  val profile = slick.driver.MySQLDriver
  import profile.api._

  /**
   *
   * Database
   * @return
   */
  def db: Database = Database.forDataSource(DB.getDataSource());

  def find(): Future[Seq[WorkOrdersDAO.WorkOrder]] = {
    val q = for (w <- WorkOrders) yield w
    try db.run(q.result)
    finally db.close
  }

  // JSON
  /**
   * Read/Writes format for java.sql.timestamp
   */
  implicit val rds: Reads[Timestamp] = (__ \ "time").read[Long].map { long => new Timestamp(long) }
  implicit val wrs: Writes[Timestamp] = (__ \ "time").write[Long].contramap { (a: Timestamp) => a.getTime }

  implicit val WorkOrdersReads = Json.reads[WorkOrdersDAO.WorkOrder]
  implicit val WorkOrdersWrites = new Writes[WorkOrdersDAO.WorkOrder] {
    def writes(w: WorkOrdersDAO.WorkOrder): JsValue = {
      Json.obj(
        "id" -> w.head.
      )
    }
  }

//  implicit val WorkOrdersWrites = new Writes[WorkOrdersDAO.WorkOrder] {
//    def writes(w: WorkOrdersDAO.WorkOrder) = Json.obj(
//      "id" -> workorder.id,
//      "long" -> location.long
//    )
//  }

}
